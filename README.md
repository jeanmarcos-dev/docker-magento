<h1 align="center">Custom Docker Magento Setup</h1>

<div align="center">
  <p>Based on <a href="https://github.com/markshust/docker-magento" target="_blank">markshust/docker-magento</a></p>
  <sub>Official documentation available at <a href="https://github.com/markshust/docker-magento">markshust/docker-magento</a></sub>
</div>

---

## Table of Contents

- [What's New](#whats-new)
- [Additional Requirements](#additional-requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Environment Setup](#environment-setup)
- [Custom Commands](#custom-commands)
- [Troubleshooting](#troubleshooting)
- [Notes](#notes)
- [License](#license)

---

## What's New

_Description of custom features added to this fork._

---

## Additional Requirements

_List any additional tools or software needed._

---

## Installation

### Automated Setup (New Project)

```bash
# Create your project directory then go into it:
mkdir -p ~/Sites/magento
cd $_

# Run this automated one-liner from the directory you want to install your project.
curl -s https://raw.githubusercontent.com/jeanmarcos-dev/docker-magento/main/lib/onelinesetup | bash -s -- magento.test community 2.4.8
```

The `magento.test` above defines the hostname to use, `community` is the Magento edition, and the `2.4.8` defines the Magento version to install. Note that since we need a write to `/etc/hosts` for DNS resolution, you will be prompted for your system password during setup.

After the one-liner above completes running, you should be able to access your site at `https://magento.test`.

#### Install sample data

After the above installation is complete, run the following lines to install sample data:

```bash
bin/magento sampledata:deploy
bin/magento setup:upgrade
```

### Manual Setup

Same result as the one-liner above. Just replace `magento.test` references with the hostname that you wish to use.

#### New Projects

```bash
# Create your project directory then go into it:
mkdir -p ~/Sites/magento
cd $_

# Download the Docker Compose template:
curl -s https://raw.githubusercontent.com/jeanmarcos-dev/docker-magento/main/lib/template | bash

# Download the version of Magento you want to use with:
bin/download community 2.4.8
# You can specify the edition (community, enterprise, mageos) and version (2.4.7-p3, 1.0.5, etc.)
# If no arguments are passed in, the edition defaults to "community"
# If no version is specified, it defaults to the most recent version defined in `bin/download`

# or for Magento core development:
# bin/start --no-dev
# bin/setup-composer-auth
# bin/cli git clone git@github.com:magento/magento2.git .
# bin/cli git checkout 2.4-develop
# bin/composer install

# Run the setup installer for Magento:
bin/setup magento.test

open https://magento.test
```

#### Existing Projects

```bash
# Create your project directory then go into it:
mkdir -p ~/Sites/magento
cd $_

# Download the Docker Compose template:
curl -s https://raw.githubusercontent.com/jeanmarcos-dev/docker-magento/main/lib/template | bash

# Take a backup of your existing database:
bin/mysqldump > ~/Sites/existing/magento.sql

# Replace with existing source code of your existing Magento instance:
cp -R ~/Sites/existing src
# or: git clone git@github.com:myrepo.git src

# Start some containers, copy files to them and then restart the containers:
bin/start --no-dev
bin/copytocontainer --all ## Initial copy will take a few minutes...

# If your vendor directory was empty, populate it with:
bin/composer install

# Import existing database:
bin/mysql < ../existing/magento.sql

# Update database connection details to use the above Docker MySQL credentials:
# Also note: creds for the MySQL server are defined at startup from env/db.env
# vi src/app/etc/env.php

# Import app-specific environment settings:
bin/magento app:config:import

# Create a DNS host entry and setup Magento base url
bin/setup-domain yoursite.test

bin/restart

open https://magento.test
```

---

## Usage

_How to use this fork and any differences from the original project._

---

## Environment Setup

_Environment configuration instructions._

---

## Custom Commands

_List and describe any new CLI or helper scripts._

---

## Troubleshooting

_Common issues and how to resolve them._

---

## Notes

_Additional context, gotchas, or development tips._

---

## License

MIT License. Original work by [Mark Shust](https://github.com/markshust/docker-magento).
