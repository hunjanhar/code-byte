def dastsecurityscan(String ZAP_TARGET) {
    sh '''
        mkdir -p /tmp/owzapzip
        rm -f /tmp/owzapzip/zap.yaml /tmp/owzapzip/zap_report.html
        chmod -R 777 /tmp/owzapzip
    '''
    sh """
        docker run --rm --network="host" \
        -v /tmp/owzapzip:/zap/wrk/:rw,z \
        ghcr.io/zaproxy/zaproxy:stable zap-baseline.py \
        -t "${ZAP_TARGET}" \
        -r zap_report.html \
        -I
    """
}