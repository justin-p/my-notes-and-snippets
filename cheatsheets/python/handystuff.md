# handy stuff

## get current function name

functionname = inspect.stack()[0][3]

### get callers name of current function

functionname = inspect.stack()[1][3]