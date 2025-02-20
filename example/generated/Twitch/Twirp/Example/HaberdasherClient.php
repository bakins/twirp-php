<?php
# Generated by the protocol buffer compiler (protoc-gen-twirp_php json-client).  DO NOT EDIT!
# source: service.proto

declare(strict_types=1);

namespace Twitch\Twirp\Example;

use Google\Protobuf\Internal\GPBDecodeException;
use Google\Protobuf\Internal\Message;

/**
 * A Protobuf client that implements the {@see Haberdasher} interface.
 * It communicates using Protobuf and can be configured with a custom HTTP Client.
 *
 * Generated from protobuf service <code>twitch.twirp.example.Haberdasher</code>
 */
final class HaberdasherClient extends HaberdasherAbstractClient implements Haberdasher
{
    /**
     * @inheritDoc
     */
    protected function doRequest(array $ctx, string $url, Message $in, Message $out): void
    {
        $body = $in->serializeToString();

        $req = $this->newRequest($ctx, $url, $body, 'application/protobuf');

        try {
            $resp = $this->httpClient->sendRequest($req);
        } catch (\Throwable $e) {
            throw $this->clientError('failed to send request', $e);
        }

        if ($resp->getStatusCode() !== 200) {
            throw $this->errorFromResponse($resp);
        }

        try {
            $out->mergeFromString((string)$resp->getBody());
        } catch (GPBDecodeException $e) {
            throw $this->clientError('failed to unmarshal proto response', $e);
        }
    }
}
