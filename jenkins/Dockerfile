FROM jenkins/jenkins:lts-jdk17
USER root
RUN \
  apt-get update \
  && apt-get install -y lsb-release\
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*
RUN curl -fsSLo /usr/share/keyrings/docker-archive-keyring.asc \
  https://download.docker.com/linux/debian/gpg
RUN echo "deb [arch=$(dpkg --print-architecture) \
  signed-by=/usr/share/keyrings/docker-archive-keyring.asc] \
  https://download.docker.com/linux/debian \
  $(lsb_release -cs) stable" > /etc/apt/sources.list.d/docker.list
RUN \
  apt-get update \
  && apt-get install -y docker-ce-cli curl php php-mysqli php-dom composer \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*
USER jenkins
RUN jenkins-plugin-cli --plugins "blueocean docker-workflow"