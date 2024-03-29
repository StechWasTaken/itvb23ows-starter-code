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
                sh 'php -v'
                sh 'composer -v'
                sh 'ls'
                dir('web') {
                    dir('app') {
                        sh 'composer install'
                        sh ' vendor/bin/phpunit --coverage-clover=coverage.xml tests'
                    }
                }
            }
        }
        stage('sonarqube') {
            steps{
                script { scannerHome = tool 'SonarQube Scanner' }
                withSonarQubeEnv('ows-sonarqube') {
                    sh "${scannerHome}/bin/sonar-scanner -Dsonar.projectKey=ows -Dsonar.coverageReportPaths=web/app/coverage.xml"
                }
            }
        }
        
    }
}