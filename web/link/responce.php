<?php

class Responce {

    /******** CONSTS *********/
    const ERR_NO_METHOD    = 1;
    const ERR_NO_RECORD    = 2;
    const ERR_WRONG_PASS   = 3;
    const ERR_WRONG_FIELDS = 4;
    const ERR_AUTH         = 5;
    const ERR_SAVE_RECORD  = 6;

    private $errorDesc;
    /********SINGLTON*********/
    
    private static $_instance = null;
    /**
     * @return Responce
     */
    public static function current() {
        if (self::$_instance == null) {
            self::$_instance = new Responce();
        }

        return self::$_instance;
    }

    /**********OTHER**********/
    private $_responce;

    const fieldErrorId   = "ErrorID";
    const fieldErrorDesc = "ErrorDescription";
    const fieldData      = "Data";

    private function __construct()
    {
        $this->_responce = Array();
        $this->_responce[self::fieldErrorId]   = 0;    
        $this->_responce[self::fieldErrorDesc] = "";
        $this->_responce[self::fieldData]      = Array();


        $this->errorDesc = Array();
        $this->errorDesc[self::ERR_NO_METHOD] = "Не передан метод для вызова";
        $this->errorDesc[self::ERR_NO_RECORD] = "Запись не найдена";
        $this->errorDesc[self::ERR_WRONG_PASS] = "Неверный пароль";
        $this->errorDesc[self::ERR_WRONG_FIELDS] = "Отправлены неверные поля";
        $this->errorDesc[self::ERR_AUTH] = "Ошибка авторизации";
        $this->errorDesc[self::ERR_SAVE_RECORD] = "Ошибка сохранения записи";
    }

    public static function WriteError(int $errorID) {
        $r = Responce::current();

        $r->_responce[self::fieldErrorId] = $errorID;
        $r->_responce[self::fieldErrorDesc] = $r->errorDesc[$errorID];

        $r->write();
        die();
    }

    public static function WriteData($data) {
        $r = Responce::current();

        $r->_responce[self::fieldData] = $data;

        $r->write();
        die();
    }
    

    public function write() {
        header('Content-Type: application/json');
        echo json_encode($this->_responce);
    }

}