<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT;

use app\libraries\Lcobucci\JWT\Encoding\CannotDecodeContent;

interface Decoder
{
    /**
     * Decodes from JSON, validating the errors
     *
     * @param non-empty-string $json
     *
     * @throws CannotDecodeContent When something goes wrong while decoding.
     */
    public function jsonDecode(string $json): mixed;

    /**
     * Decodes from Base64URL
     *
     * @link http://tools.ietf.org/html/rfc4648#section-5
     *
     * @return ($data is non-empty-string ? non-empty-string : string)
     *
     * @throws CannotDecodeContent When something goes wrong while decoding.
     */
    public function base64UrlDecode(string $data): string;
}
