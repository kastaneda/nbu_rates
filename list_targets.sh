#!/bin/sh

# Alternative implementation for list_targets.php
# PHP variant is 250 times faster

for t in $(seq 841622400 86400 $(date +%s -d now+10hour))
do
  TZ=UTC date +data/%Y%m%d.json -d @$t
done
