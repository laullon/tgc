<?php

class ArrayTest extends PHPUnit_Framework_TestCase
{
    private $url="http://tgc.laullon.com";

    public function testApiTest()
    {
        $r = new HttpRequest("{$this->url}/api/test/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $this->assertEquals(json_encode("test ok"), $r->getResponseBody());
    }

    public function testConsultaTarjetaConHistorias()
    {
        $t_id="C9DEC65818B03AD2";
        $r = new HttpRequest("{$this->url}/api/tarjeta/{$t_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $res=json_decode($r->getResponseBody());
        $this->assertEquals($t_id, $res->tarjeta->cardCode);
        $this->assertGreaterThanOrEqual(1, sizeof($res->historias));
    }

    public function testConsultaHistoria()
    {
        $h_id="931";
        $r = new HttpRequest("{$this->url}/api/historia/{$h_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(200, $r->getResponseCode());
        $res=json_decode($r->getResponseBody());
        $this->assertEquals($h_id, $res->ID);
    }

    public function testConsultaHistoriaNoValida()
    {
        $h_id="3636363636";
        $r = new HttpRequest("{$this->url}/api/historia/{$h_id}/", HttpRequest::METH_GET);
        $r->send();
        $this->assertEquals(404, $r->getResponseCode());
    }

    public function testConsultaTarjetaNoValida()
    {
        $tid="poipoi";
        $r = new HttpRequest("{$this->url}/api/tarjeta/{$tid}/", HttpRequest::METH_GET);
        $r->send();
        $tarjeta=json_decode($r->getResponseBody());
        $this->assertEquals(404, $r->getResponseCode());
    }

}
?>
