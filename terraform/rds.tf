resource "random_password" "db_password" {
  length           = 16
  special          = false
}

resource "aws_db_subnet_group" "code_byte_db_subnet_group" {
  name        = "code-byte-db-subnet-group"
  description = "Database subnet group for personal blog app VPC"

  subnet_ids  = [
    aws_subnet.rds_private_subnet_a.id, 
    aws_subnet.rds_private_subnet_b.id
  ]

  tags = { Name = "code-byte-db-subnet-group" }
}

resource "aws_security_group" "code_byte_rds_security_group" {
  name        = "code-byte-rds-sg"
  description = "Controls inbound traffic to the MySQL RDS database instance"
  vpc_id      = aws_vpc.code_byte_vpc.id

  ingress {
    from_port       = 3306
    to_port         = 3306
    protocol        = "tcp"
    description     = "Allow MySQL traffic from our cluster EC2 instances only"
    security_groups = [aws_security_group.code_byte_security_group.id] 
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = { Name = "rds-mysql-sg" }
}

resource "aws_db_instance" "code-byte-mysql" {
  allocated_storage       = 20
  max_allocated_storage   = 30
  engine                  = "mysql"
  engine_version          = "8.0"
  instance_class          = "db.t4g.micro"
  
  db_name                 = "codebyte"
  username                = "admin"
  password                = random_password.db_password.result
  
  storage_type            = "gp3"
  multi_az                = false
  backup_retention_period = 1
  skip_final_snapshot     = true
  deletion_protection     = false
  vpc_security_group_ids  = [aws_security_group.code_byte_rds_security_group.id]
  db_subnet_group_name    = aws_db_subnet_group.code_byte_db_subnet_group.name
}