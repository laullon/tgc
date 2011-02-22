<?php

class ArrayTest extends PHPUnit_Framework_TestCase {

    private $url = "http://tgc.laullon.com";

    public function testApiTest() {
        $r = new HttpRequest("{$this->url}/api/test/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $this->assertEquals(json_encode("test ok"), $r->getResponseBody());
    }

    public function testConsultaTarjetaConHistorias() {
        $t_id = "C9DEC65818B03AD2";
        $r = new HttpRequest("{$this->url}/api/tarjeta/{$t_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $res = json_decode($r->getResponseBody());
        $this->assertEquals($t_id, $res->tarjeta->cardCode);
        $this->assertGreaterThanOrEqual(1, sizeof($res->historias));
    }

    public function testConsultaHistoria($h_id = "931") {
        $r = new HttpRequest("{$this->url}/api/historia/{$h_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode(), "Historia '{$h_id}' not found");
        $res = json_decode($r->getResponseBody());
        $this->assertEquals($h_id, $res->ID);
        return $res->post_content;
    }

    public function testConsultaHistoriaNoValida() {
        $h_id = "3636363636";
        $r = new HttpRequest("{$this->url}/api/historia/{$h_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(404, $r->getResponseCode());
    }

    public function testConsultaTarjetaNoValida() {
        $tid = "poipoi";
        $r = new HttpRequest("{$this->url}/api/tarjeta/{$tid}/", HttpRequest::METH_GET);
        $r->send();
        $tarjeta = json_decode($r->getResponseBody());
        $this->assertEquals(404, $r->getResponseCode());
    }

    public function testLogin() {
        $login = 'sf52';
        $r = new HttpRequest("{$this->url}/api/login/", HttpRequest::METH_POST);
        $r->addPostFields(array('user' => $login, 'pass' => 'sf52'));
        $r->send();
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(200, $r->getResponseCode(), $res);
        $this->assertEquals($login, $res->user_login, $res);
        return $r->getResponseCookies();
    }

    public function testLoginKO() {
        $r = new HttpRequest("{$this->url}/api/login/", HttpRequest::METH_POST);
        $r->addPostFields(array('user' => 'sf52', 'pass' => 'poipoi'));
        $r->send();
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(500, $r->getResponseCode(), $res);
    }

    public function testLoginNoPost() {
        $r = new HttpRequest("{$this->url}/api/login/", HttpRequest::METH_GET);
        $r->send();
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(500, $r->getResponseCode(), $res);
    }

    public function testUserInfo($cookie=NULL) {
        if ($cookie == NULL) {
            $cookies = $this->testLogin();
            $cookie = $this->getCookie($cookies);
        }
        $r = new HttpRequest("{$this->url}/api/user/info/", HttpRequest::METH_GET);
        $r->addCookies($cookie);
        $r->send();
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(200, $r->getResponseCode(), $res);
        $this->assertEquals(true, is_array($res->tarjetas), "tarjetas");
        $this->assertEquals(true, is_array($res->historias), "historias");
        return $res;
    }

    public function testUserInfoKO() {
        $r = new HttpRequest("{$this->url}/api/user/info/", HttpRequest::METH_GET);
        $r->send();
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(500, $r->getResponseCode(), $res);
    }

    public function testNuevaHistoria($cookie=NULL) {
        $t_id = "C9DEC65818B03AD2";
        $h = rand(1000000000, 9999999999) . " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id sapien eu elit suscipit malesuada eget at arcu. Vestibulum molestie molestie urna ac tincidunt. Integer id condimentum libero. Cras scelerisque dolor nec lectus consectetur tristique. Donec vulputate ante at orci aliquet placerat. Duis erat enim, commodo a dictum eu, faucibus vel urna. Integer scelerisque imperdiet pulvinar. Maecenas egestas commodo lectus non hendrerit. Mauris id sem eu turpis auctor cursus eget eu est. Duis laoreet posuere neque, vitae viverra metus porttitor nec.";

        $r = new HttpRequest("{$this->url}/api/historia/nueva/", HttpRequest::METH_POST);
        if ($cookie != NULL) {
            $r->addCookies($cookie);
        }
        $r->addPostFields(array(
            'tarjeta' => $t_id,
            'historia' => $h,
            'fecha' => '2011-02-10 00:00:00',
            'lugar' => "madrid"
        ));
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $res = json_decode($r->getResponseBody());
        $this->assertEquals(true, is_numeric($res), $r->getResponseBody());
        $this->assertEquals($h, $this->testConsultaHistoria($res));
        return $res;
    }

    public function testNuevaHistoriaUsuario() {
        $cookies = $this->testLogin();
        $cookie = $this->getCookie($cookies);
        $h_id = $this->testNuevaHistoria($cookie);
        $u_info = $this->testUserInfo($cookie);
        foreach ($u_info->historias as $h) {
            $h_u_ids[]=$h->ID;
        }
        $this->assertEquals(true, in_array($h_id, $h_u_ids), "h: {$h_id}, uh:".join(",",$h_u_ids));
    }

    private function getCookie($cookies) {
        foreach ($cookies as $c) {
            if ($c->path == "/") {
                foreach ($c->cookies as $c_key => $c_val) {
                    $cookie[$c_key] = $c_val;
                }
            }
        }
        return $cookie;
    }

}

?>
