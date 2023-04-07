for ELEMENT in *.php
do
    result=$(php $ELEMENT)
    if [ "$result" != "true" ]; then
        echo "Warning : Test $ELEMENT: $result didn't pass, please check the test. Exiting..."
        exit 1
    else
        echo "Test $ELEMENT: $result : PASS"
    fi
done