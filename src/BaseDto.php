<?php

/*
 * This file is part of the october-moon/base_dto
 */

namespace OctoberMoon\BaseDto;

class BaseDto
{
    /**
     * 记录数据.
     *
     * @var mixed
     */
    private $data;

    /**
     * 状态.
     *
     * @var string
     */
    private $status = 'success';

    /**
     * 返回信息.
     *
     * @var string
     */
    private $message;

    /**
     * 请求状态code.
     *
     * @var int
     */
    private $code;

    /**
     * 字段错误提示信息.
     *
     * @var mixed
     */
    private $error = [];

    /**
     * 服务器时间.
     *
     * @var string
     */
    private $currentTime;

    public function __construct($code, $msg, $data = null)
    {
        $this->code = $code;
        $this->message = $msg;
        $this->data = $data;
        $this->currentTime = date('Y-m-d H:i:s');
        if (200 !== intval($code)) {
            $this->status = 'error';
        }
    }

    /**
     * 设置错误的参数列表.
     */
    public function setError(array $error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->message;
    }

    /**
     * 状态码
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCurrentTime()
    {
        return $this->currentTime;
    }

    /**
     * 转数组.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'status' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data,
            'currentTime' => $this->currentTime,
            'errors' => $this->error,
        ];
    }

    /**
     * 转json.
     *
     * @return string
     */
    public function toJson()
    {
        return \json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}
