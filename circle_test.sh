#!/bin/bash

docker run --env-file build/circle_env "ministryofjustice/12-factor-wordpress-demo" ./test.sh
