<?php
return array(
              'user' => array(
                  'first_name' => 'Required|Min:3|Max:80|Alpha',
                  'last_name' => 'Required|Min:3|Max:80|Alpha',
                  'email'     => 'Between:3,64|Email',
                  'password'  =>'Required|AlphaNum|Between:4,8|Confirmed',
                  'password_confirmation'=>'Required|AlphaNum|Between:4,8')
);
