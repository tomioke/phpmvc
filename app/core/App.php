<?php 

class App {
    // Controller default
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if($url == NULL) {
            $url = [$this->controller];
        }

        // Controllers
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
            $this->controller = $url[0];
            unset($url[0]);
            
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if ( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        if ( !empty($url) ) {
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada,
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if ( isset($_GET['url']) ) {
            // Hapus '/' dibagian akhir url
            $url = rtrim($_GET['url'], '/');
            // Supaya url bersih dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah url
            $url = explode('/', $url);
            return $url;
        }
    }
}
