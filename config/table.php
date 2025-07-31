<?php

return [
    "inquiries" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "date"
        ],
        "ip" => [
            "name" => "ip",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "email" => [
            "name" => "email",
            "type" => "email"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
    ],
    "awaiting-prescriptions" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "string"
        ],
        "comment" => [
            "name" => "comment",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
        "address" => [
            "name" => "address",
            "type" => "string",
        ],
        "document" => [
            "name" => "document",
            "type" => "file"
        ],
    ],
    "shipments" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "string"
        ],
        "comment" => [
            "name" => "comment",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
        "address" => [
            "name" => "address",
            "type" => "string",
        ],
        "document" => [
            "name" => "document",
            "type" => "file"
        ],
        "pod" => [
            "name" => "pod",
            "type" => "file"
        ],
    ],
    "billed-by-insurance" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "string"
        ],
        "comment" => [
            "name" => "comment",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
        "address" => [
            "name" => "address",
            "type" => "string",
        ],
        "document" => [
            "name" => "document",
            "type" => "file"
        ],
        "pod" => [
            "name" => "pod",
            "type" => "file"
        ],
    ],
    "paid-by-insurance" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "string"
        ],
        "comment" => [
            "name" => "comment",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
        "address" => [
            "name" => "address",
            "type" => "string",
        ],
        "document" => [
            "name" => "document",
            "type" => "file"
        ],
        "pod" => [
            "name" => "pod",
            "type" => "file"
        ],
    ],
    "denied" => [
        "timestamp" => [
            "name" => "created_at",
            "type" => "string"
        ],
        "comment" => [
            "name" => "comment",
            "type" => "string"
        ],
        "name" => [
            "name" => "name",
            "type" => "string"
        ],
        "phone" => [
            "name" => "phone",
            "type" => "string"
        ],
        "address" => [
            "name" => "address",
            "type" => "string",
        ],
        "document" => [
            "name" => "document",
            "type" => "file"
        ],
        "pod" => [
            "name" => "pod",
            "type" => "file"
        ],
    ]
];
