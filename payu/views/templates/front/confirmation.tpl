{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
*  @author Kenneth Onah <kenneth@netcraft-devops.com>
*  @copyright  2015 NetCraft DevOps
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  Property of NetCraft DevOps
*}
{extends file=$layout}

{block name='content'}
	<section id="main">

		{capture name=path}{l s='PayU secure payments' mod='payu'}{/capture}

		<div style="margin: 0 10px 10px 50px">

			<h3><strong>{l s='Awesome!!! Your order arrived with much fanfare.' mod='payu'}</strong></h3>
			<p>{l s='Payment processing is complete and ' mod='payu'}<span class="bold">{$state}</span></p>
			<p>{l s='Order confirmation has been sent to your email' mod='payu'}</p>
			<br />
			<p>
			<h4>{l s='Payment details ' mod='payu'}</h4>
			-{l s=' Amount paid: ' mod='payu'} <span class="price"> <strong>R{$total_paid}</strong></span>
			<br /><br />
			- {l s='Card: ' mod='payu'}  <strong>{if $cardInfo}{$cardInfo}{else}___________{/if}</strong>
			<br /><br />
			- {l s='Name on card: ' mod='payu'}  <strong>{if $name_on_card}{$name_on_card}{else}___________{/if}</strong>
			<br /><br />
			- {l s='Card Number: ' mod='payu'}  <strong>{if $card_number}{$card_number}{else}___________{/if}</strong>
			<br /><br />
			- {l s='PayU Reference: ' mod='payu'}  <strong>{if $payu_ref}{$payu_ref}{else}___________{/if}</strong>
			<br /><br />
			{l s='If you have any questions or concerns, please contact our ' mod='payu'}
			<a href="{$link->getPageLink('contact', true)|escape:'html'}" style="color:#317fd8">{l s='CUSTOMER CARE.' mod='payu'}</a>
			</p>
		</div>
	</section>
{/block}