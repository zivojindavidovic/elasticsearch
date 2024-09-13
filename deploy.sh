#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Define the branches
DEVELOP_BRANCH="develop"
MASTER_BRANCH="master"

# Fetch the latest changes
git fetch --all

# Switch to develop branch and pull the latest changes
echo "Switching to $DEVELOP_BRANCH branch..."
git checkout $DEVELOP_BRANCH
echo "Pulling the latest changes from $DEVELOP_BRANCH..."
git pull origin $DEVELOP_BRANCH

# Switch to master branch and pull the latest changes
echo "Switching to $MASTER_BRANCH branch..."
git checkout $MASTER_BRANCH
echo "Pulling the latest changes from $MASTER_BRANCH..."
git pull origin $MASTER_BRANCH

# Merge develop into master
echo "Merging $DEVELOP_BRANCH into $MASTER_BRANCH..."
git merge $DEVELOP_BRANCH

# Push the changes to the master branch
echo "Pushing changes to $MASTER_BRANCH..."
git push origin $MASTER_BRANCH

echo "Merge complete!"
