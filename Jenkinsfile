pipeline {
    agent { docker { image 'php:8.3.3-apache' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
    }
}