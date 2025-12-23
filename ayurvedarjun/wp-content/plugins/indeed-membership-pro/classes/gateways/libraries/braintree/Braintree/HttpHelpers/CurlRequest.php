<?php
namespace Braintree\HttpHelpers;

class deusBoboPCARequest implements HttpRequest
{
    private $_handle = null;

    public function __construct($url)
    {
        $this->_handle = deusBoboPCA_init($url);
    }

    public function setOption($name, $value)
    {
        deusBoboPCA_setopt($this->_handle, $name, $value);
    }

    public function execute()
    {
        return deusBoboPCA_exec($this->_handle);
    }

    public function getInfo($name)
    {
        return deusBoboPCA_getinfo($this->_handle, $name);
    }

    public function getErrorCode()
    {
        return deusBoboPCA_errno($this->_handle);
    }

    public function getError()
    {
        return deusBoboPCA_error($this->_handle);
    }

    public function close()
    {
        deusBoboPCA_close($this->_handle);
    }
}
