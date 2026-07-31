def checkoutCode(String repoUrl, String branchName) {
    echo "Checking out ${repoUrl} on branch [${branchName}]"
    cleanWs()
    git url: repoUrl, branch: branchName
}