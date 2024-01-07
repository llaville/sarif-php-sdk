#!/usr/bin/env bash

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

ASSETS_JSON_DIR="tests/results"

php $SCRIPT_DIR/serialize.php message/embeddedLinks $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php message/formatted $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php message/plainText $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php message/stringLookup $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php address $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php artifact $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php attachment $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php codeFlow $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php configurationOverride $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php conversion $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php exception $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php externalProperties $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php externalPropertyFileReferences $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php fix $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php graph $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php graphTraversal $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php locationRelationship $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php logicalLocation $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php physicalLocation $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php rectangle $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php reportingConfiguration $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php reportingDescriptor $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php reportingDescriptorReference $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php reportingDescriptorRelationship $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php result $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php resultProvenance $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php run $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php runAutomationDetails $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php sarifLog $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php specialLocations $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php stack $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php suppression $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php tool $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php translationMetadata $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php versionControlDetails $ASSETS_JSON_DIR
php $SCRIPT_DIR/serialize.php webRequest $ASSETS_JSON_DIR
