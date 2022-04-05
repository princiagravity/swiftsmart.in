<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-06 07:12:15 --> Query error: Table 'gravigw4_pwa_test.customer_details' doesn't exist - Invalid query: SELECT id,name,phone_no,address,profile_pic,email_id,area from customer_details where status != 'Deleted' order by created_on desc limit 10
ERROR - 2021-08-06 07:12:22 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: SELECT id,customer_id,delivery_boy_id,area,cart_total,discount,invoice_no,order_time,tax,delivery_charge,delivery_tax,tax_amount,order_total,payment_type,status from order_details where id=images
