<?php
/**
 * 2007-2014 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 *  @author Kenneth Onah <kenneth@netcraft-devops.com>
 *  @copyright  2015 NetCraft DevOps
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  Property of NetCraft DevOps
 */

class PayuValidationModuleFrontController extends ModuleFrontController
{

    /*
 * @see FrontController::postProcess()
*/
    public function postProcess()
    {
        $payuModule = $this->module;
        $context = $payuModule->getCurrentContext();

        if(!empty($payuModule) && !empty($context)) {
            $cart = $context->cart;
            if (!$cart->id_customer || !$cart->id_address_delivery || !$cart->id_address_invoice|| !$this->module->active)
                Tools::redirect('index.php?controller=order&step=1');

            // Check that this payment option is still available in case the customer changed
            // his address just before the end of the checkout process
            $authorized = false;
            foreach (Module::getPaymentModules() as $module) {
                if ($module['name'] == 'payu') {
                    $authorized = true;
                    break;
                }
            }

            if (!$authorized) {
                Tools::redirect('index.php?controller=order&step=1');
            }
            $customer = new Customer($cart->id_customer);
            if (!Validate::isLoadedObject($customer))
                Tools::redirect('index.php?controller=order&step=1');

            $currency = $context->currency;
            $total = (float)$cart->getOrderTotal(true, Cart::BOTH);
            $payuModule->validateOrder(
                $cart->id,
                Configuration::get('PS_OS_AWAITING_PAYMENT'),
                $total,
                $payuModule->displayName, null, null,
                (int)$currency->id, false, $customer->secure_key
            );
            $payuReference = $payuModule->doSetTransaction($cart);
            if(!empty($payuReference)) {

                $order = new Order($payuModule->currentOrder);
                $msg = new Message();
                $msg->message = 'Redirected to PayU, PayU reference: ' . $payuReference;
                $msg->id_cart = (int)$cart->id;
                $msg->id_customer = intval($order->id_customer);
                $msg->id_order = intval($order->id);
                $msg->private = 1;
                $msg->add();

                $redirectUrl = $payuModule->getTransactionServer() . '/rpp.do?PayUReference=' . $payuReference;
                Tools::redirect($redirectUrl);
                exit;
            } else {
                $this->context->smarty->assign(array(
                 //   'hide_left_column' => $this->display_column_left,
                    'error' => Tools::displayError('Could not connect to payment gateway. Please contact the system administrator'),
                ));
                return $this->setTemplate('module:payu/views/templates/front/failed.tpl');
            }
        }
        $this->context->smarty->assign(array(
            'hide_left_column' => $this->display_column_left,
            'error' => Tools::displayError('Payment method currently unavailable. Please contact the system administrator'),
        ));
        return $this->setTemplate('module:payu/views/templates/front/failed.tpl');
    }


}