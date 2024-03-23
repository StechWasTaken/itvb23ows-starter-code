pipeline {
    agent { docker { image 'php:8.3.4-alpine3.19' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
    }
    agent { label { '!windows' }}
    stage {
        steps{
            script { scannerHome = tool 'SonarQube Scanner' }
            withSonarQubeEnv('SonarQube') {
                sh "${scannerHome}/bin/sonar-scanner -Dsonar.projectKey=[key]"
            }
        }
    }
}