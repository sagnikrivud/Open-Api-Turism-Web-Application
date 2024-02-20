#!/bin/bash

git pull origin master

if [ $? -eq 0 ]; then
    echo "Git pull completed successfully."
else
    echo "Error: Git pull failed."
fi