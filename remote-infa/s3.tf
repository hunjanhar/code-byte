# this is s3 bucket on aws
resource "aws_s3_bucket" "remote-infra" {
    bucket = "tf-state-bucket-code-byte-application"
    force_destroy = true
    tags = {
        Name = "tf-state-bucket-code-bye-application"
    }
}