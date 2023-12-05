#!/bin/bash

set -e

mongo <<EOF
use admin
db = db.getSiblingDB('smarthr')
db.createUser({
  user: 'smarthr',
  pwd: 'smarthr',
  roles: [
    {
      role: "readWrite",
      db: "smarthr"
    }
  ]
});

EOF
