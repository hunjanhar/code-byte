output "SERVER_IP" {
    value = aws_instance.ubuntu.public_ip
    description = "Public IP address of the Ubuntu instance"
}

output "codebyte-db-name" {
  description = "The name of the database created inside MySQL"
  value       = aws_db_instance.code-byte-mysql.db_name
}

output "codebyte-db-host" {
  description = "The connection endpoint/host for your RDS instance"
  value       = aws_db_instance.code-byte-mysql.address
}

output "codebyte-db-user" {
  description = "The master username for database login"
  value       = aws_db_instance.code-byte-mysql.username
}

output "codebyte-db-password" {
  description = "The dynamically generated master password"
  value       = random_password.db_password.result
  sensitive   = true
}
