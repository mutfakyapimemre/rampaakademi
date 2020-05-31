<?php      
    /**
    * EFECELL API CLASS (CODEIGNITER FRAMEWORK VERSION)
    */
    class CI_Efecell_api
    {
        private $authorization  = null;
        
        /**
         * YETKİLENDİRME 
         * @return null;
        */
        public function authorization ($apiKey = null)
        {
            $this -> authorization = $apiKey;
        }

        /**
        * BAKİYE SORGULA
        * @return object
        */
        public function queryBalance ()
        {
            $curl = curl_init('http://api.efecell.com.tr/v2/get/balance'); 
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');                                                                     
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Key '.$this -> authorization]);                                                                                                                   
            $json_data = curl_exec($curl);
            curl_close($curl);
            return $json_data;
        }

        /**
        * BAŞLIK SORGULA
        * @return object
        */
        public function queryOriginators ()
        {
            $curl = curl_init('http://api.efecell.com.tr/v2/get/originators'); 
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');                                                                     
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Key '.$this -> authorization]);        
            $json_data = curl_exec($curl);
            curl_close($curl);
            return $json_data;
        }

        /**
        * MESAJ GÖNDER
        * @param array
        * @return object
        */
        public function sendSms ($data = null)
        {
            if (array_key_exists('originator', $data)):
                if (array_key_exists('message', $data)):
                    if (array_key_exists('to', $data)):
                        if (!array_key_exists('encoding', $data)):
                            $data['encoding'] = 'auto';
                        endif;

                        $data = json_encode($data);
                        $curl = curl_init('http://api.efecell.com.tr/v2/sms/basic'); 
                        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');   
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                   
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
                        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                            'Content-Type: application/json',
                            'Accept: application/json',
                            'Authorization: Key '.$this -> authorization]);                                                                                                                 
                        $json_data = curl_exec($curl);
                        curl_close($curl);
                        return $json_data;
                    else:
                        exit('<b>to</b> parametresi eksik!');
                    endif;
                else:
                    exit('<b>message</b> parametresi eksik!');
                endif;
            else:
                exit('<b>originator</b> parametresi eksik!');
            endif;
        }

        /**
        * RAPOR SORGULA
        * @param integer
        * @return object
        */
        public function getReport ($data = null)
        {
            if (array_key_exists('id', $data)):
                $data = json_encode($data);
                $curl = curl_init('http://api.efecell.com.tr/v2/get/report'); 
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');   
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                   
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Key '.$this -> authorization]);                                                                                                                 
                $json_data = curl_exec($curl);
                curl_close($curl);
                return $json_data;
            else:
                exit('<b>id</b> parametresi eksik!');
            endif;
        }
    }