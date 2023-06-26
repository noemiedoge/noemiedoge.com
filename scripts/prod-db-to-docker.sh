#!/bin/bash
# Highlights the transfer of a production database to a local Docker environment.

# Define the SSH connection details
ssh_user="noemiedoge"
ssh_host="ssh-noemiedoge.alwaysdata.net"

# Define the WordPress installation path
wp_path="~/www/2023.noemiedoge.com"

# Define the output file name for the SQL dump
output_file="/tmp/wordpress_$(date +%Y%m%d_%H%M%S).sql"

# Confirmation prompt
read -p "WARNING: This will erase your Docker database. Do you confirm? [Y/n] " confirm
confirm=${confirm:-Y}

if [[ ! $confirm =~ ^[Yy]$ ]]; then
    echo "Operation canceled."
    exit 0
fi

# SSH into the server, run the WP-CLI command to export the SQL dump, and save it to a temporary file
ssh "${ssh_user}@${ssh_host}" "cd ${wp_path} && wp db export ${output_file}"

# Copy the SQL dump from the remote server to the local machine
scp "${ssh_user}@${ssh_host}:${output_file}" production.sql

# Load the SQL dump into the MySQL server running in the Docker container on the local machine
cat production.sql | docker-compose exec -T db bash -c "mysql -u \$MYSQL_USER -p\$MYSQL_PASSWORD \$MYSQL_DATABASE"

# Print a success message
echo "SQL dump loaded into MySQL server."

# Cleanup: Remove the temporary files
ssh "${ssh_user}@${ssh_host}" "rm ${output_file}"
rm ./production.sql
