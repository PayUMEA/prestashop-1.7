<p align="center">
<img src="https://cloud.githubusercontent.com/assets/5717025/15674295/335fa446-273c-11e6-9db1-76c1b89d153d.jpg" alt="1">
</p>

# payu-mea-rpp-prestashop-v1.7
PayU's updated plugin for PrestaShop v1.7.x.x.

Please note that PHP SOAP extension is required for the plugin to work. Other requirements include running Apache 2+ with PHP 5.4+, if in doubt contact your hosting provider.

1. Login to your PrestaShop administrator
![image](https://cloud.githubusercontent.com/assets/5717025/17849199/02c30910-6858-11e6-85cc-761e2c9b3163.png)
2. Navigate to Modules and Services -> Modules and Services
![image](https://cloud.githubusercontent.com/assets/5717025/17849232/25f85214-6858-11e6-997c-47bd6cb47e2f.png)
3. Click Add a new module to open module installation page
![image](https://cloud.githubusercontent.com/assets/5717025/17849255/3fd7fa90-6858-11e6-84a5-143925f8238f.png)
  3.1 Module installation box should now be visible. Click Choose a file to select PayU .zip module file from where you saved it, and     click Upload this module. Ignore warning message and Proceed with this installation.
![image](https://cloud.githubusercontent.com/assets/5717025/17849278/59a902e8-6858-11e6-815f-1886169ec120.png)

![image](https://cloud.githubusercontent.com/assets/5717025/17849282/664fcbbc-6858-11e6-9fe4-eee40225b62a.png)
4. After Uploading module successfully. Click Install to install module.
![image](https://cloud.githubusercontent.com/assets/5717025/17849317/8c4a6b9c-6858-11e6-9b04-2f1386d35f91.png)
5. Click Configure to enter your Safe key, API username, password and choose payment methods activated on your PayU account. Transaction Server should be switched to Live Server before accepting real payments. Save your configuration.
![image](https://cloud.githubusercontent.com/assets/5717025/17849343/9e65b6ba-6858-11e6-93d4-2a089d77e806.png)
6. PayU payment method should now be available for checkout by your customers.
![image](https://cloud.githubusercontent.com/assets/5717025/17849362/b62d625c-6858-11e6-94e7-bbee2817f656.png)
7. PayU Payment method can be configured for both South Africa and Nigerian Stores.
![image](https://cloud.githubusercontent.com/assets/5717025/17849421/fad54500-6858-11e6-98e4-23079a368f6c.png)

![image](https://cloud.githubusercontent.com/assets/5717025/17849468/358ae66e-6859-11e6-9bd2-e6f021f9bab2.png)
8. When customer is redirected to PayU for payment, customer order will be placed in Awaiting PayU payment pending state.
![image](https://cloud.githubusercontent.com/assets/5717025/17849490/5144d02c-6859-11e6-97ba-9984ef49d90c.png)
8.1. You can also update the order status manually by Navigating to Sales -> Orders and click View to view the order.
![image](https://cloud.githubusercontent.com/assets/5717025/17849507/6201d522-6859-11e6-9ca0-3e809b373cfc.png)

Manual installation:

Upload the 'payu' folder within the zipped file to the 'modules' directory of a PrestaShop installation using Filezilla
