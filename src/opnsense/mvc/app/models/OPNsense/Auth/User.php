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

namespace OPNsense\Auth;

use OPNsense\Base\Messages\Message;
use OPNsense\Base\BaseModel;

/**
 * Class User
 * @package OPNsense\System
 */
class User extends BaseModel
{
    /**
     * @param string $name username
     * @return User object
     */
    public function getUserByName(string $name)
    {
        foreach ($this->user->iterateItems() as $node) {
            if ($node->name == $name) {
                return $node;
            }
        }
        return null;
    }

    /**
     * @param string $key api key
     * @return array authentication data
     */
    public function getApiKeySecret(string $key)
    {
        foreach ($this->user->iterateItems() as $node) {
            $key = $node->apikeys->get($key);
            if (!empty($key)) {
                $key['username'] = (string)$node->name;
                return $key;
            }
        }
        return null;
    }

    /**
     * @return array list of api key records
     */
    public function getApiKeys()
    {
        $result = [];
        foreach ($this->user->iterateItems() as $node) {
            foreach ($node->apikeys->all() as $apikey) {
                $result[] = array_merge(['username' => (string)$node->name], $apikey);
            }
        }
        return $result;
    }
}
