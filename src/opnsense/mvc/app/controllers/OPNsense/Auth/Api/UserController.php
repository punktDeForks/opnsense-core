<?php

/*
 * Copyright (C) 2024 Deciso B.V.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace OPNsense\Auth\Api;

use OPNsense\Base\ApiMutableModelControllerBase;
use OPNsense\Base\UserException;

/**
 * Class CertController
 * @package OPNsense\Auth\Api
 */
class UserController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'user';
    protected static $internalModelClass = 'OPNsense\Auth\User';

    public function searchAction()
    {
        return $this->searchBase('user');
    }

    public function getAction($uuid = null)
    {
        return $this->getBase('user', 'user', $uuid);
    }

    public function addAction()
    {
        return $this->addBase('user', 'user');
    }

    public function setAction($uuid = null)
    {
        return $this->setBase('user', 'user', $uuid);
    }

    public function delAction($uuid)
    {
        return $this->delBase('user', $uuid);
    }

    public function searchApiKeyAction()
    {

        return $this->searchRecordsetBase($this->getModel()->getApiKeys());
    }

}
