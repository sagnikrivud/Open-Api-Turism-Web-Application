#!/bin/bash

# Specify the name of the folder in the root directory
folder_name="writable"

# Check if the folder exists
if [ -d "/$folder_name" ]; then
    # Set the folder permissions to 755
    chmod 755 "/$folder_name"
    echo "Permissions for /$folder_name set to 755."
else
    echo "Error: The specified folder does not exist."
fi