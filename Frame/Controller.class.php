<?php

/**
 * Basic controller
 */
class Controller {
	protected $smarty;
	/**
	 * constructor
	 */
	public function __construct() {
		$this->initCode();
		$this->initSmarty();
	}
	/**
	 * initial code
	 */
	protected function initCode() {
		header("Content-type:text/html;Charset=utf-8");
	}
	/**
	 * initial Smarty
	 */
	protected function initSmarty() {
		$this->smarty = new Smarty;
		$this->smarty->setTemplateDir(CURRENT_VIEW_DIR . CONTROLLER . '/');
		$this->smarty->setCompileDir(APP_DIR . PLATFORM . '/View_c/' . CONTROLLER . '/');
	}
	/**
	 * assign method
	 */
	protected function assign($name, $value) {
		$this->smarty->assign($name, $value);
	}
	/**
	 * display method
	 */
	protected function display($tpl) {
		$this->smarty->display($tpl);
	}
	/**
     * redirect method
     * @param $url target url
     * @param $info tips
     * @param $time wait time
     */
	protected function jump($url, $info=null, $time=2) {
        if(is_null($info)) {
            header('location:' . $url);
            die;
        } else {
            echo <<<TIAOZHUAN
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>msg</title>
    <style type='text/css'>
        * {margin:0; padding:0;}
        div {width:390px; height:287px; border:1px #09C solid; position:absolute; left:50%; margin-left:-195px; top:10%;}
        div h2 {width:100%; height:30px; line-height:30px; background-color:#09C; font-size:14px; color:#FFF; text-indent:10px;}
        div p {height:120px; line-height:120px; text-align:center;}
        div p strong {font-size:26px;}
    </style>
	<div>
        <h2>msg</h2>
        <p>
            <strong>$info</strong><br />
			Page will redirect after <span id="second">$time</span>seconds，or click<a id="tiao" href="$url">redirect now</a>
        </p>
    </div>
    <script type="text/javascript">
        var url = document.getElementById('tiao').href;
        function daoshu(){
            var scd = document.getElementById('second');
            var time = --scd.innerHTML;
            if(time<=0){
                window.location.href = url;
                clearInterval(mytime);
            }
        }
        var mytime = setInterval("daoshu()",1000);
    </script>
TIAOZHUAN;
        die;
        }
    }

    protected function escapeData($data)
    {
        return addslashes(strip_tags(trim($data)));
    }
}