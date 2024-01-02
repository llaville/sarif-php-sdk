#!/usr/bin/env bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

ASSETS_IMAGE_DIR="docs/assets/images"

php $SCRIPT_DIR/build.php graph-composer $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-address $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-artifact $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-artifact-change $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-artifact-content $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-attachment $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-code-flow $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-configuration-override $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-conversion $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-edge $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-edge-traversal $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-exception $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-external-properties $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-external-property-file-reference $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-external-property-file-references $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-fix $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-graph $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-graph-traversal $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-invocation $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-location-relationship $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-logical-location $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-message $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-node $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-notification $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-physical-location $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-rectangle $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-replacement $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-reporting-configuration $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-reporting-descriptor $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-reporting-descriptor-reference $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-reporting-descriptor-relationship $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-result $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-result-provenance $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-run $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-run-automation-details $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-sarif-log $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-special-locations $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-stack $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-stack-frame $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-suppression $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-thread-flow $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-thread-flow-location $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-tool $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-tool-component-reference $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-translation-metadata $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-version-control-details $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-web-request $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php reference-web-response $ASSETS_IMAGE_DIR
