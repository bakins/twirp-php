<?php
# Generated by the protocol buffer compiler (protoc-gen-twirp_php master).  DO NOT EDIT!
# source: service.proto

declare(strict_types=1);

namespace Twitch\Twirp\Example;

use Google\Protobuf\Internal\GPBDecodeException;
use Google\Protobuf\Internal\Message;

/**
 * A JSON client that implements the {@see Haberdasher} interface.
 * It communicates using JSON and can be configured with a custom HTTP Client.
 *
 * Generated from protobuf service <code>twitch.twirp.example.Haberdasher</code>
 */
final class HaberdasherJsonClient extends HaberdasherAbstractClient implements Haberdasher
{
    /**
     * @inheritDoc
     */
    protected function doRequest(array $ctx, string $url, Message $in, Message $out): void
    {
        $body = $in->serializeToJsonString();

        $req = $this->newRequest($ctx, $url, $body, 'application/json');

        try {
            $resp = $this->httpClient->sendRequest($req);
        } catch (\Throwable $e) {
            throw $this->clientError('failed to send request', $e);
        }

        if ($resp->getStatusCode() !== 200) {
            throw $this->errorFromResponse($resp);
        }

        try {
            $out->mergeFromJsonString((string)$resp->getBody());
        } catch (GPBDecodeException $e) {
            throw $this->clientError('failed to unmarshal json response', $e);
        }
    }
}
