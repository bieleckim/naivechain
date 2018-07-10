# Naivechain

Very simple blockchain implementation.

[![Build Status](https://travis-ci.org/bieleckim/naivechain.svg?branch=master)](https://travis-ci.org/bieleckim/naivechain)
[![codecov](https://codecov.io/gh/bieleckim/naivechain/branch/master/graph/badge.svg)](https://codecov.io/gh/bieleckim/naivechain)

## Installation
```sh
composer install
```

## Testing
```sh
# run server in background on 127.0.0.1:1234 (default)
./bin/naivechain

# another one with 1235 port and 127.0.0.1:1234 peer
./bin/naivechain 1235 127.0.0.1:1234

# run tests
./vendor/bin/phpunit
```

## References

* https://medium.com/@lhartikk/a-blockchain-in-200-lines-of-code-963cc1cc0e54
* https://github.com/azophy/naivechain-php