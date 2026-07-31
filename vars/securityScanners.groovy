def runGitleaks() {
    sh 'gitleaks detect --source=. --verbose'
}

def runTrivyFileSystem() {
    sh '''
        mkdir -p /tmp/trivy/contrib
        chmod -R 777 /tmp/trivy
        curl -sSL https://raw.githubusercontent.com/aquasecurity/trivy/v0.71.2/contrib/html.tpl -o /tmp/trivy/contrib/html.tpl
    '''
    sh 'trivy fs . --scanners vuln,secret,misconfig --severity HIGH,CRITICAL --format template --template "@/tmp/trivy/contrib/html.tpl" -o /tmp/trivy/trivy_fs_report.html'
    sh 'trivy fs . --scanners vuln,secret,misconfig --severity HIGH,CRITICAL --exit-code 1 > /tmp/trivy/trivy_summary_report.txt'
}

def runTrivyImageScan(String registry, String imageName, String tag) {
    sh "trivy image --severity HIGH,CRITICAL --exit-code 1 ${registry}/${imageName}:${tag}"
}