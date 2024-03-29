pipeline {
    agent any
    stages {
        stage('checkout') {
            steps {
                checkout scm
            }
        }
        stage('phpunit tests') {
            steps {
                sh 'cd web/app'
                sh 'composer install'
                sh 'vendor/bin/phpunit tests'
            }
        }
        stage('sonarqube') {
            steps{
                script { scannerHome = tool 'SonarQube Scanner' }
                withSonarQubeEnv('ows-sonarqube') {
                    sh "${scannerHome}/bin/sonar-scanner -Dsonar.projectKey=ows"
                }
            }
        }
        
    }
}