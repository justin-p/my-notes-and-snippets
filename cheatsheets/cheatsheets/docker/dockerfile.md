# Dockerfile

[source](https://devhints.io/dockerfile)

## Reference

### Inheritance

```text
FROM ruby:2.2.2
```

### Variables

```text
ENV APP_HOME /myapp
RUN mkdir $APP_HOME
```

### Initialization

```text
RUN bundle install
```

```text
WORKDIR /myapp
```

```text
VOLUME ["/data"]
# Specification for mount point
```

```text
ADD file.xyz /file.xyz
COPY --chown=user:group host_file.xyz /path/container_file.xyz
```

### Onbuild

```text
ONBUILD RUN bundle install
# when used with another file
```

### Commands

```text
EXPOSE 5900
CMD    ["bundle", "exec", "rails", "server"]
```

### Entrypoint

```text
ENTRYPOINT ["executable", "param1", "param2"]
ENTRYPOINT command param1 param2
```

Configures a container that will run as an executable.

```text
ENTRYPOINT exec top -b
```

This will use shell processing to substitute shell variables, and will ignore any `CMD` or `docker run` command line arguments.

### Metadata

```text
LABEL version="1.0"
```

```text
LABEL "com.example.vendor"="ACME Incorporated"
LABEL com.example.label-with-value="foo"
```

```text
LABEL description="This text illustrates \
that label-values can span multiple lines."
```

## See also

* [Docker Docs Builder](https://docs.docker.com/engine/reference/builder)

