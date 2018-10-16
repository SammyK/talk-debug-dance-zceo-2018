# The Debug Dance @ ZendCon & Open Enterprise 2018

This repo contains a list of examples used in my talk, ["The Debug Dance - An Intro To Step Debugging" @ ZendCon & Open Enterprise 2018](https://www.zendcon.com/sessions/the-debug-dance-an-intro-to-step-debugging).

- [Slides](https://speakerdeck.com/sammyk/the-debug-dance-an-intro-to-step-debugging-zendcon-and-openenterprise-2018)
- [Feedback](https://joind.in/event/zendcon-2018/the-debug-dance-an-intro-to-step-debugging)

## Docker setup

Before you build, if you're not on macOS (non-Mac), you might have to remove the following line from `docker/xdebug.ini`:

```
xdebug.remote_host=10.254.254.254
```

...but I'm not 100% sure - I'm not able to test on non-macOS platforms. :)

To build the docker image, run:

```bash
$ docker build -t debug-dance:latest ./
```

After the image is built, you can run the container:

```bash
$ docker run -d --rm -p 80:80 -v $(pwd):/var/www/html --name dance debug-dance
```

Now you should be able to visit the example files from `http://localhost` such as [http://localhost/phpinfo.php](http://localhost/phpinfo.php).

To stop the container:

```bash
$ docker stop dance
```

### macOS Setup

If you're on Mac, before xdebug can work in PhpStorm with, "Listen for debug connections", you have to create an alias for `10.254.254.254` on your machine (not inside the docker container).

```bash
$ sudo ifconfig en0 alias 10.254.254.254 255.255.255.0
```
