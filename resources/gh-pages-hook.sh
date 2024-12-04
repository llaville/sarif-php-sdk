#!/usr/bin/env bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

ASSETS_IMAGE_DIR="docs/assets/images"

php $SCRIPT_DIR/build.php graph-composer $ASSETS_IMAGE_DIR
php $SCRIPT_DIR/build.php builder-api $ASSETS_IMAGE_DIR
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

ASSETS_JSON_DIR="docs/assets/sarif"

JSON_ENCODE_FLAGS=192 # (pretty print: 128, unescaped slashes: 64)

php $SCRIPT_DIR/serialize.php message/embeddedLinks $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php message/formatted $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php message/plainText $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php message/stringLookup $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php address $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php artifact $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php attachment $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php codeFlow $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php configurationOverride $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php conversion $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php exception $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php externalProperties $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php externalPropertyFileReferences $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php fix $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php graph $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php graphTraversal $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php locationRelationship $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php logicalLocation $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php physicalLocation $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php rectangle $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php reportingConfiguration $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php reportingDescriptor $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php reportingDescriptorReference $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php reportingDescriptorRelationship $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php result $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php resultProvenance $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php run $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php runAutomationDetails $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php sarifLog $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php specialLocations $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php stack $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php suppression $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php tool $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php translationMetadata $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php versionControlDetails $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
php $SCRIPT_DIR/serialize.php webRequest $ASSETS_JSON_DIR $JSON_ENCODE_FLAGS
