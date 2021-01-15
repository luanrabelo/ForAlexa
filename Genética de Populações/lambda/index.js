const Alexa = require('ask-sdk-core');
const i18n  = require('i18next');
//
//var persistenceAdapter = getPersistenceAdapter();
// Include languages 
const languageStrings = require('./languages');


// Start Skill 
const LaunchRequestHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'LaunchRequest';
    },
    handle(handlerInput) {
        const a = handlerInput.t('WELCOME_MSG_ONE');
        const b = handlerInput.t('WELCOME_MSG_TWO');
        const c = handlerInput.t('WELCOME_MSG_TREE');
        const speakOutput = a + b + c;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt('Você pode me perguntar "quais as aulas ministradas na disciplina", ou você pode pedir "ajuda" ou pedir para sair, o que deseja fazer?')
            .getResponse();
    }
};

//quais as aulas ministradas na disciplina?
const AulasHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'Aulas';
    },
    handle(handlerInput) {
        const a = handlerInput.t('Lessons');
        const speakOutput = a + 'Se você deseja saber as perguntas de cada aula, você pode me perguntar, por exemplo, Quais perguntas da aula dois, ou quais perguntas da aula sete, lembrando que tenho perguntas da aula até a aula oito, o que deseja me perguntar?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};

//Ementa 
const EmentaHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'Ementa';
    },
    handle(handlerInput) {
        const a = handlerInput.t('Ementa');
        const speakOutput = a;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            //.withShouldEndSession(false)
            .getResponse();
    }
};


// Perguntas aleatórias aula um
const LessonOneRand = [
    ` O que é alélo `,
    ` O que é polimorfismo `,
    ` O que é homologia evolutiva `, 
    ` O que é homoplazía `, 
    ` O que é evolução convergente `, 
    ` O que são genes ortólogos `, 
    ` O que são genes parálogos `, 
    ` O que é o coeficiente de endogamia `, 
    ` O que é diversidade genética `, 
    ` Qual a relação entre endocruzamento e extinção `, 
    ` Quais as evidências da relação entre, endocruzamento e extinção, em populações naturais `, 
    ` O que é o vórtice de extinção `, 
    ` Qual a relação entre perda de diversidade genética e doenças `
    ];
const QuestionsOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsOne';
    },
    handle(handlerInput) {
        const a = LessonOneRand;
        const b = a[Math.floor(Math.random() * a.length)];
        const c = a[Math.floor(Math.random() * a.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +b+ ' , ou , <break time="0.5s" />' +c+ '. <break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula um?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
    };

// Perguntas aleatórias aula dois
const LessonTwoRand = [
    ` Quem foi Mendel `,
    ` Qual a primeira Lei de Mendel `,
    ` Qual a segunda Lei de Mendel `, 
    ` O que é o equilíbrio de Hardy e Weinberg `, 
    ` Como é passada a informação genética `, 
    ` Quais as premissas do equilíbrio de Hardy e Weinberg `, 
    ` Qual a importância do equilíbrio de Hardy e Weinberg `, 
    ` Como funciona o equilíbrio de Hardy e Weinberg em cromossomos sexuais `, 
    ` O que é Desequilíbrio gamético `, 
    ` O que é ligação gamética `, 
    ` O que é depressão por endocruzamento `, 
    ` O que é um alô zigoto `, 
    ` O que é hetérose `,
    ` O que é acasalamento seletivo `,
    ` Mostre me um exemplo prático do equilíbrio de Hardy e Weinberg `,
    ` O que é consanguinidade `,
    ` Os efeitos da consanguinidade `,
    ` Quais fatores podem levar ao desequilíbrio gamético `,
    ` O que é repulsão `,
    ` O que é a fração de recombinação `,
    ` O que é um auto zigoto `,
    ` O que é acoplamento `,
    ` Quais os impactos da endogamia `,
    ` Como testar se uma população está em equilíbrio de Hardy e Weinberg `,
    ` Como pode ser medido o endocruzamento `,
    ` Como será o equilíbrio de Hardy e Weinberg para mais de dois alelos `
    ];
const QuestionsTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsTwo';
    },
    handle(handlerInput) {
        const d = LessonTwoRand;
        const e = d[Math.floor(Math.random() * d.length)];
        const f = d[Math.floor(Math.random() * d.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +e+ ' , ou , <break time="0.5s" />' +f+ '.<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula dois?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula três
const LessonTreeRand = [
    ` O que é deriva genética `,
    ` Quais as consequências da deriva genética em populações pequenas `,
    ` Qual a relação entre amostragem e deriva genética `, 
    ` O que é o modelo de uraite-ficher `, 
    ` Quais as suposições do modelo de Wright e Fisher `, 
    ` Quais as conclusões do modelo de Wright Fisher `, 
    ` Cite modelos de probabilidade que podem ser usados para explicar a deriva genética `, 
    ` Como funciona a distribuição de probabilidade binomial para deriva genética `, 
    ` O que são cadeias markovianas `, 
    ` Como funciona as cadeias markovianas em relação a deriva `, 
    ` O que é a propriedade markoviana `, 
    ` O que é o modelo de difusão de partículas `, 
    ` O que é o tamanho efetivo populacional `,
    ` O que é o censo populacional `,
    ` O que é o efeito fundador `,
    ` O que é o efeito de gargalo de garrafa `,
    ` Como a variância pode interferir no tamanho efetivo populacional `,
    ` O que é o isolamento por distância `,
    ` O que é deme `,
    ` O que é vizinhança genética `,
    ` Qual o papel da seleção e deriva na fixação ou perda de alelo `
    ];
const QuestionsTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsTree';
    },
    handle(handlerInput) {
        const g = LessonTreeRand;
        const h = g[Math.floor(Math.random() * g.length)];
        const i = g[Math.floor(Math.random() * g.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +h+ ' , ou , <break time="0.5s" />' +i+ '.<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula três?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula quatro
const LessonFourRand = [
    ` O que é um evento coalescente `,
    ` O que é genealogia `,
    ` O que é linhagem `, 
    ` O que é o Ancestral comum mais recente `, 
    ` O que é cópia do gene. Ou cópia gênica. Ou cópia do alelo `, 
    ` O que é tempo de espera `, 
    ` Como funciona a coalescência `, 
    ` O que é N. coalescência. Ou coalescência de Kingman. `, 
    ` Um exemplo de coalescência em uma situação de gargalo de garrafa `, 
    ` Como se faz para calcular o tamanho da população ancestral através da coalescência `, 
    ` O que são as cadeias markovianas `, 
    ` O que é a propriedade markoviana `, 
    ` O que é o método monte carlo `,
    ` De que maneira funciona uma busca da genealogia verdadeira através da coalescência `
    ];
const QuestionsFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsFour';
    },
    handle(handlerInput) {
        const j = LessonFourRand;
        const k = j[Math.floor(Math.random() * j.length)];
        const l = j[Math.floor(Math.random() * j.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +k+ ' , ou , <break time="0.5s" />' +l+ '<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula quatro?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula cinco
const LessonFiveRand = [
    ` O que é uma população pam mítica `,
    ` O que é estrutura populacional `,
    ` O que é fluxo gênico `, 
    ` O que é evento vicariante `, 
    ` O que são subpopulações `, 
    ` O que é Isolamento por Distância `, 
    ` A diferença entre Fluxo gênico e Migração `, 
    ` O que são medidas diretas de Fluxo Gênico `, 
    ` Quais são as medidas diretas de Fluxo Gênico `, 
    ` O que é fluxo gênico críptico `, 
    ` Como se mede a sub divisão populacional `, 
    ` O que é o Efeito Wahlund `, 
    ` O que é quebra de isolamento `,
    ` O que é o modelo continente ilha `,
    ` O que é o Modelo duas Ilhas `,
    ` O que é o Modelo Ilhas infinitas `,
    ` O que é o modelo stepping stone`,
    ` O que é o modelo de metapopulação `,
    ` Como se descreve o fluxo gênico em genealogias `
    ];
const QuestionsFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsFive';
    },
    handle(handlerInput) {
        const m = LessonFiveRand;
        const n = m[Math.floor(Math.random() * m.length)];
        const o = m[Math.floor(Math.random() * m.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +n+ ' , ou , <break time="0.5s" />' +o+ '<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula cinco?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula seis
const LessonSixRand = [
    ` O que é Mutação `,
    ` Quais os tipos de mutações `,
    ` O que é a taxa de mutação `, 
    ` Como se calcula a taxa de mutação por lócos `, 
    ` Como a mutação rara pode ser importante para a variabilidade genética das populações `, 
    ` O que é espectro de aptidão de mutação `, 
    ` Qual o impacto da mutação no organismo `, 
    ` Qual o destino de uma nova mutação `, 
    ` Qual a frequência esperada de uma mutação nova em gerações posteriores `, 
    ` Qual a chance de se perder uma mutação nova em apenas uma geração. Ou, Como, através de segregação mendeliana, uma nova mutação pode ser perdida?`, 
    ` O que é Micromutacionalismo `, 
    ` O que é o modelo geométrico de Fisher `, 
    ` O que é a catraca de Miller `,
    ` O que é o Modelo de alelos infinitos `,
    ` O que é o modelo de ká alelos `,
    ` O que é o Modelo de mutação passo a passo `,
    ` Diga um exemplo de distância genética `,
    ` O que é o modelo de sítios infinitos `,
    ` O que é o Modelo de sítios finitos `,
    ` O que é Mutação irreversível `,
    ` O que é Pressão de mutação `,
    ` O que é Mutação reversível. Ou bidirecional `,
    ` O que é o parâmetro théta `,
    ` Como é detectado um evento mutacional através de genealogias. Ou, Como funciona o modelo coalescente com mutação `
    ];
const QuestionsSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsSix';
    },
    handle(handlerInput) {
        const p = LessonSixRand;
        const q = p[Math.floor(Math.random() * p.length)];
        const r = p[Math.floor(Math.random() * p.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +q+ ' , ou , <break time="0.5s" />' +r+ '.<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula seis?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula sete
const LessonSevenRand = [
    ` O que é seleção natural `,
    ` O que é a seleção direcional `,
    ` O que é a seleção disruptiva. Ou, O que é a balanceadora `, 
    ` O que é aptidão absoluta `, 
    ` O que é aptidão relativa `, 
    ` O que é aptidão média `, 
    ` O que é Coeficiente de Seleção `, 
    ` Quais as premissas da seleção natural, através de reprodução sexual `, 
    ` O que é o processo determinístico `, 
    ` O que é o processo estocástico `, 
    ` Quais os tipos de seleção que ocorrem para os alelos `, 
    ` O que é seleção contra um fenótipo recessivo `, 
    ` O que é seleção contra um fenótipo dominante `,
    ` O que é dominância geral. Ou, Codominância `,
    ` O que é desvantagem do heterozigoto `,
    ` O que é vantagem do heterozigoto `,
    ` O que é o teorema fundamental da seleção natural `
    ];
const QuestionsSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsSeven';
    },
    handle(handlerInput) {
        const s = LessonSevenRand;
        const t = s[Math.floor(Math.random() * s.length)];
        const u = s[Math.floor(Math.random() * s.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +t+ ' , ou , <break time="0.5s" />' +u+ '.<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula sete?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

// Perguntas aleatórias aula oito
const LessonEightRand = [
    ` O que é divergência genética `,
    ` O que é substituição alélica `,
    ` O que é a teoria neutra `, 
    ` Quem foi Motoo Kimura `, 
    ` Quem foi Tomoko Ohta `, 
    ` Qual o destino das mutações de acordo com a teoria neutra `, 
    ` Qual o tempo de fixação de um alelo seguindo a teoria neutra `, 
    ` O que é a teoria próxima da neutralidade `, 
    ` Quando as mutações serão efetivamente neutras `, 
    ` O que é a distância P. `, 
    ` O que é diversidade genética `, 
    ` O que é saturação de bases `, 
    ` O que são sítios segregantes `,
    ` O que é diversidade nucleotídica `,
    ` O que é o relógio molecular `,
    ` O que é taxa de substituição absoluta `,
    ` O que é um relógio molecular super disperso `,
    ` Quais as causas para variação nas taxas de mutação `,
    ` Quais os testes para detecção de desvio da neutralidade `,
    ` Como funciona o teste D. de tajima `,
    ` O que é efeito carona `,
    ` O que é Varredura seletiva `,
    ` O que é Seleção de fundo `,
    ];
const QuestionsEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'QuestionsEight';
    },
    handle(handlerInput) {
        const v = LessonEightRand;
        const x = v[Math.floor(Math.random() * v.length)];
        const z = v[Math.floor(Math.random() * v.length)];
        const speakOutput = 'Você pode me perguntar, por exemplo, <break time="0.5s" />' +x+ ' , ou , <break time="0.5s" />' +z+ '.<break time="0.5s" />. Ou você Gostaria de ouvir mais perguntas sobre a aula oito?';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt()
            //.withShouldEndSession(false)
            .getResponse();
            
    },
};

const ConfirmationHandler = {  
    canHandle(handlerInput) {  
        return handlerInput.requestEnvelope.request.type === 'IntentRequest'  
            && handlerInput.requestEnvelope.request.intent.name === 'AMAZON.YesIntent'; 
    }, 
        handle(handlerInput) {
        return handlerInput.responseBuilder
            .speak('Qual aula você deseja saber mais perguntas?')
            .withShouldEndSession(false)
            .getResponse();
            
        }
};  

// Lesson 1 - Genética e Extinção
const TopicLessonOneOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja conhecer os tópicos das outras aulas, você pode me perguntar, quais os tópicos da aula dois ';
        const a = handlerInput.t('TopicLessonOne_1');
        const b = handlerInput.t('TopicLessonOne_2');
        const c = handlerInput.t('TopicLessonOne_3');
        const d = handlerInput.t('TopicLessonOne_4');
        const e = handlerInput.t('TopicLessonOne_5');
        const f = handlerInput.t('TopicLessonOne_6');
        const speakOutput = a + b + c + d + e + f + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question One - O que é alelo?
const LessonOneQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_1_1');
        const b = handlerInput.t('Lesson_1_Answer_1_2');
        const c = handlerInput.t('Lesson_1_Answer_1_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Two - O que é Polimorfismo?
const LessonOneQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_2_1');
        const b = handlerInput.t('Lesson_1_Answer_2_2');
        const c = handlerInput.t('Lesson_1_Answer_2_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Tree - O que é Homologia Evolutiva?
const LessonOneQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_3_1');
        const b = handlerInput.t('Lesson_1_Answer_3_2');
        const c = handlerInput.t('Lesson_1_Answer_3_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Four - O que é Homoplasia?
const LessonOneQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_4_1');
        const b = handlerInput.t('Lesson_1_Answer_4_2');
        const c = handlerInput.t('Lesson_1_Answer_4_3');
        const d = handlerInput.t('Lesson_1_Answer_4_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Five - O que é Evolução Convergente?
const LessonOneQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_5_1');
        const b = handlerInput.t('Lesson_1_Answer_5_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Six - O que são Genes Ortólogos?
const LessonOneQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_6_1');
        const b = handlerInput.t('Lesson_1_Answer_6_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Seven - O que são Genes Parálogos?
const LessonOneQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_7_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Eight - O que é o Coeficiente de Endogamia?
const LessonOneQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_8_1');
        const b = handlerInput.t('Lesson_1_Answer_8_2');
        const c = handlerInput.t('Lesson_1_Answer_8_3');
        const d = handlerInput.t('Lesson_1_Answer_8_4');
        const e = handlerInput.t('Lesson_1_Answer_8_5');
        const speakOutput = a + b + c + d + e + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Nine - O que é Diversidade Genética?
const LessonOneQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_9_1');
        const b = handlerInput.t('Lesson_1_Answer_9_2');
        const c = handlerInput.t('Lesson_1_Answer_9_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Ten - Qual a relação entre Endocruzamento e Extinção?
const LessonOneQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_10_1');
        const b = handlerInput.t('Lesson_1_Answer_10_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Eleven - Um exemplo da relação entre Endocruzamento e Extinção?
const LessonOneQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_11_1');
        const b = handlerInput.t('Lesson_1_Answer_11_2');
        const c = handlerInput.t('Lesson_1_Answer_11_3');
        const d = handlerInput.t('Lesson_1_Answer_11_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Twelve - Quais as evidências da relação entre Endocruzamento e Extinção em populações naturais?
const LessonOneQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_12_1');
        const b = handlerInput.t('Lesson_1_Answer_12_2');
        const c = handlerInput.t('Lesson_1_Answer_12_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Thirteen - O que é o Vórtice de Extinção?
const LessonOneQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_13_1');
        const b = handlerInput.t('Lesson_1_Answer_13_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question Fourteen - Qual a relação entre perda de Diversidade Genética e doenças?
const LessonOneQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonOneQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula um ';
        const a = handlerInput.t('Lesson_1_Answer_14_1');
        const b = handlerInput.t('Lesson_1_Answer_14_2');
        const c = handlerInput.t('Lesson_1_Answer_14_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
//End Lesson 1 - Genética e Extinção

// Lesson 2 
const TopicLessonTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('TopicLessonTwo_1');
        const speakOutput = a  + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1
const LessonTwoQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2
const LessonTwoQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwo';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
       const a = handlerInput.t('Lesson_2_Answer_2');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3 
const LessonTwoQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTree';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_3');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4 
const LessonTwoQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionFour';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5 
const LessonTwoQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionFive';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_5');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6 
const LessonTwoQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionSix';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_6');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7
const LessonTwoQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionSeven';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_7');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8
const LessonTwoQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionEight';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_8');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9
const LessonTwoQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionNine';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_9');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10
const LessonTwoQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_10');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11
const LessonTwoQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionEleven';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_11');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12
const LessonTwoQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_12');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13
const LessonTwoQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_13');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14
const LessonTwoQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_14');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 15
const LessonTwoQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_15');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16
const LessonTwoQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_16');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17
const LessonTwoQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_17');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 18
const LessonTwoQuestionEighteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionEighteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_18');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 19
const LessonTwoQuestionNineteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionNineteen';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_19');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 20
const LessonTwoQuestionTwentyHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwenty';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_20');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 21
const LessonTwoQuestionTwentyOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyOne';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_21');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 22
const LessonTwoQuestionTwentyTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyTwo';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_22');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 23
const LessonTwoQuestionTwentyTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyTree';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_23');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 24
const LessonTwoQuestionTwentyFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyFour';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_24');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 25
const LessonTwoQuestionTwentyFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyFive';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_25');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 26
const LessonTwoQuestionTwentySixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentySix';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_26');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 27
const LessonTwoQuestionTwentySevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentySeven';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_27');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 28
const LessonTwoQuestionTwentyEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTwoQuestionTwentyEight';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula dois ';
        const a = handlerInput.t('Lesson_2_Answer_28');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};

// Lesson 3 
// Topic 
const TopicLessonTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonTree';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('TopicLessoTree_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1
const LessonTreeQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionOne';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2
const LessonTreeQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTwo';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_2');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3
const LessonTreeQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTree';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_3');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4
const LessonTreeQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionFour';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5
const LessonTreeQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionFive';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_5');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6
const LessonTreeQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionSix';
    },
    handle(handlerInput) {
        const quest = '  Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_6');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7
const LessonTreeQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_7');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8
const LessonTreeQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_8');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9
const LessonTreeQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_9');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10
const LessonTreeQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_10');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11
const LessonTreeQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_11');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12
const LessonTreeQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_12');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13
const LessonTreeQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_13');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14
const LessonTreeQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_14');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 15
const LessonTreeQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_15');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16
const LessonTreeQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_16');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17
const LessonTreeQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_17');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 18
const LessonTreeQuestionEighteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionEighteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_18');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 19
const LessonTreeQuestionNineteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionNineteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_19');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 20
const LessonTreeQuestionTwentyHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTwenty';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_20');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 21
const LessonTreeQuestionTwentyOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTwentyOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_21');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 22
const LessonTreeQuestionTwentyTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonTreeQuestionTwentyTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula três ';
        const a = handlerInput.t('Lesson_3_Answer_22');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};





// Lesson 4 - Coalescência

const TopicLessonFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('TopicLessoFour_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};

// Question 1
const LessonFourQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_1_1') + handlerInput.t('Lesson_4_Answer_1_2');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2
const LessonFourQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_2_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3
const LessonFourQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_3_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4
const LessonFourQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_4_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5
const LessonFourQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_5_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6
const LessonFourQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_6_1') + handlerInput.t('Lesson_4_Answer_6_2') + handlerInput.t('Lesson_4_Answer_6_3') + handlerInput.t('Lesson_4_Answer_6_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7
const LessonFourQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_7_1') + handlerInput.t('Lesson_4_Answer_7_2') + handlerInput.t('Lesson_4_Answer_7_3') + handlerInput.t('Lesson_4_Answer_7_4') + handlerInput.t('Lesson_4_Answer_7_5') + handlerInput.t('Lesson_4_Answer_7_6') + handlerInput.t('Lesson_4_Answer_7_7');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8
const LessonFourQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_8_1') + handlerInput.t('Lesson_4_Answer_8_2') + handlerInput.t('Lesson_4_Answer_8_3') + handlerInput.t('Lesson_4_Answer_8_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9
const LessonFourQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_9_1') + handlerInput.t('Lesson_4_Answer_9_2') + handlerInput.t('Lesson_4_Answer_9_3') + handlerInput.t('Lesson_4_Answer_9_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10
const LessonFourQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_10_1') + handlerInput.t('Lesson_4_Answer_10_2') + handlerInput.t('Lesson_4_Answer_10_3') + handlerInput.t('Lesson_4_Answer_10_4') + handlerInput.t('Lesson_4_Answer_10_5');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11
const LessonFourQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_11_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12
const LessonFourQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_12_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13
const LessonFourQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_13_1') + handlerInput.t('Lesson_4_Answer_13_2');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14
const LessonFourQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFourQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula quatro ';
        const a = handlerInput.t('Lesson_4_Answer_14_1') + handlerInput.t('Lesson_4_Answer_14_2') + handlerInput.t('Lesson_4_Answer_14_3') + handlerInput.t('Lesson_4_Answer_14_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};





// Lesson 5 - Estrutura Populacional e Fluxo Gênico
const TopicLessonFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('TopicLessoFive_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1
const LessonFiveQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2
const LessonFiveQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_2');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3
const LessonFiveQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_3');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4
const LessonFiveQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_4');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5
const LessonFiveQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_5');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6
const LessonFiveQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_6');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7
const LessonFiveQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_7');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8
const LessonFiveQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_8');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9
const LessonFiveQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_9');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10
const LessonFiveQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_10');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11
const LessonFiveQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_11');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12
const LessonFiveQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_12');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13
const LessonFiveQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_13');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14
const LessonFiveQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_14');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 15
const LessonFiveQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_15');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16
const LessonFiveQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_16');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17
const LessonFiveQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_17');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 18
const LessonFiveQuestionEighteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionEighteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_18');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 19
const LessonFiveQuestionNineteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonFiveQuestionNineteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula cinco ';
        const a = handlerInput.t('Lesson_5_Answer_19');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Fim 

// Lesson 6 - Mutação
const TopicLessonSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('TopicLessonSix_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1 - o que é Mutação?
const LessonSixQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_1_1');
        const b = handlerInput.t('Lesson_6_Answer_1_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2 - quais os tipos de mutações?
const LessonSixQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_2_1');
        const b = handlerInput.t('Lesson_6_Answer_2_2');
        const c = handlerInput.t('Lesson_6_Answer_2_3');
        const d = handlerInput.t('Lesson_6_Answer_2_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3 - o que é a taxa de mutação?
const LessonSixQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_3_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_4_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_5');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_6');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_7');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_8');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_9');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10 - como se calcula a taxa de mutação por lócos?
const LessonSixQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_10');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11 - o que é Micromutacionalismo?
const LessonSixQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_11');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12 - o que é o modelo geométrico de Fisher?
const LessonSixQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_12');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13 - o que é a catraca de Miller?
const LessonSixQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_13');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14 - o que Modelo de alelos infinitos?
const LessonSixQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_14');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 15 - o que é o modelo de ká alelos?
const LessonSixQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_15');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16
const LessonSixQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_16');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17
const LessonSixQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_17');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 18
const LessonSixQuestionEighteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionEighteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_18');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 19
const LessonSixQuestionNineteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionNineteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_19');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 20
const LessonSixQuestionTwentyHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwenty';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_20');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 21
const LessonSixQuestionTwentyOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwentyOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_21');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 22
const LessonSixQuestionTwentyTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwentyTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_22');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 23
const LessonSixQuestionTwentyTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwentyTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_23');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 24
const LessonSixQuestionTwentyFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSixQuestionTwentyFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula seis ';
        const a = handlerInput.t('Lesson_6_Answer_24');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Fim Mutação




// Lesson 7 - Fundamentos da Seleção Natural
const TopicLessonSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('TopicLessonSeven_1');
        const b = handlerInput.t('TopicLessonSeven_2');
        const c = handlerInput.t('TopicLessonSeven_3');
        const d = handlerInput.t('TopicLessonSeven_4');
        const e = handlerInput.t('TopicLessonSeven_5');
        const speakOutput = a + b + c + d + e + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1 - O que é seleção natural?
const LessonSevenQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_1_1');
        const b = handlerInput.t('Lesson_7_Answer_1_2');
        const c = handlerInput.t('Lesson_7_Answer_1_3');
        const d = handlerInput.t('Lesson_7_Answer_1_4');
        const e = handlerInput.t('Lesson_7_Answer_1_5');
        const f = handlerInput.t('Lesson_7_Answer_1_6');
        const speakOutput = a + b + c + d + e + f + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2 - O que é a seleção direcional?
const LessonSevenQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_2_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3 - O que é a seleção disruptiva? ou balanceodora?
const LessonSevenQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_3_1');
        const b = handlerInput.t('Lesson_7_Answer_3_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4 - O que é aptidão absoluta?
const LessonSevenQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_4_1');
        const b = handlerInput.t('Lesson_7_Answer_4_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5 - O que é aptidão relativa?
const LessonSevenQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_5_1');
        const b = handlerInput.t('Lesson_7_Answer_5_2');
        const c = handlerInput.t('Lesson_7_Answer_5_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6 - O que é aptidão média?
const LessonSevenQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_6_1');
        const b = handlerInput.t('Lesson_7_Answer_6_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7 - O que é Coeficiente de Seleção?
const LessonSevenQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_7_1');
        const b = handlerInput.t('Lesson_7_Answer_7_2');
        const c = handlerInput.t('Lesson_7_Answer_7_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8 - Quais as premissas da seleção natural, através de reprodução sexual?
const LessonSevenQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_8_1');
        const b = handlerInput.t('Lesson_7_Answer_8_2');
        const c = handlerInput.t('Lesson_7_Answer_8_3');
        const d = handlerInput.t('Lesson_7_Answer_8_4');
        const e = handlerInput.t('Lesson_7_Answer_8_5');
        const speakOutput = a + b + c + d + e + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9 - O que é o processo determinístico?
const LessonSevenQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_9_1');
        const b = handlerInput.t('Lesson_7_Answer_9_2');
        const c = handlerInput.t('Lesson_7_Answer_9_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10 - O que é o processo estocástico?
const LessonSevenQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_10_1');
        const b = handlerInput.t('Lesson_7_Answer_10_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11 - Quais os tipos de seleção que ocorre para os alelos?
const LessonSevenQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_11_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12 - O que é seleção contra um fenótipo recessivo?
const LessonSevenQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_12_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13 - O que é seleção contra um fenótipo dominante?
const LessonSevenQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_13_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14 - o que é dominância geral? Codominância?
const LessonSevenQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_14_1');
        const b = handlerInput.t('Lesson_7_Answer_14_2');
        const c = handlerInput.t('Lesson_7_Answer_14_3');
        const d = handlerInput.t('Lesson_7_Answer_14_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
 // Question 15 - o que é desvantagem do heterozigoto?
const LessonSevenQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_15_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16 - o que é vantagem do heterozigoto?
const LessonSevenQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_16_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17 - o que é o teorema fundamental da seleção natural?
const LessonSevenQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonSevenQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula sete ';
        const a = handlerInput.t('Lesson_7_Answer_17_1');
        const b = handlerInput.t('Lesson_7_Answer_17_2');
        const c = handlerInput.t('Lesson_7_Answer_17_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
//End Lesson 7 - Fundamentos da Seleção Natural

// Lesson 8 - Evolução Molecular
const LessonEightQuestionOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_1_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 1 - o que é divergência genética?
const TopicLessonEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'TopicLessonEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('TopicLessonEight_1');
        const b = handlerInput.t('TopicLessonEight_2');
        const c = handlerInput.t('TopicLessonEight_3');
        const d = handlerInput.t('TopicLessonEight_4');
        const e = handlerInput.t('TopicLessonEight_5');
        const f = handlerInput.t('TopicLessonEight_6');
        const g = handlerInput.t('TopicLessonEight_7');
        const speakOutput = a + b + c + d + e + f + g + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 2 - o que é substituição alélica?
const LessonEightQuestionTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_2_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 3 - o que é a teoria neutra?
const LessonEightQuestionTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_3_1');
        const b = handlerInput.t('Lesson_8_Answer_3_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 4 - quem foi Motoo Kimura?
const LessonEightQuestionFourHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionFour';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_4_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 5 - quem foi Tomoko Ohta?
const LessonEightQuestionFiveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionFive';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_5_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 6 - qual o destino das mutações de acordo com a teoria neutra?
const LessonEightQuestionSixHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionSix';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_6_1');
        const b = handlerInput.t('Lesson_8_Answer_6_2');
        const c = handlerInput.t('Lesson_8_Answer_6_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 7 - qual o tempo de fixação de um alelo seguindo a teoria neutra?
const LessonEightQuestionSevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionSeven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_7_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 8
const LessonEightQuestionEightHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionEight';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_8_1');
        const b = handlerInput.t('Lesson_8_Answer_8_2');
        const c = handlerInput.t('Lesson_8_Answer_8_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 9
const LessonEightQuestionNineHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionNine';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_9_1');
        const b = handlerInput.t('Lesson_8_Answer_9_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 10
const LessonEightQuestionTenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_10_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 11
const LessonEightQuestionElevenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionEleven';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_11_1');
        const b = handlerInput.t('Lesson_8_Answer_11_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 12
const LessonEightQuestionTwelveHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwelve';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_12_1');
        const b = handlerInput.t('Lesson_8_Answer_12_2');
        const c = handlerInput.t('Lesson_8_Answer_12_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 13
const LessonEightQuestionThirteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionThirteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_13_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 14
const LessonEightQuestionFourteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionFourteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_14_1');
        const b = handlerInput.t('Lesson_8_Answer_14_2');
        const speakOutput = a + b + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 15
const LessonEightQuestionFifteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionFifteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_15_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 16
const LessonEightQuestionSixteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionSixteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_16_1');
        const b = handlerInput.t('Lesson_8_Answer_16_2');
        const c = handlerInput.t('Lesson_8_Answer_16_3');
        const d = handlerInput.t('Lesson_8_Answer_16_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 17
const LessonEightQuestionSeventeenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionSeventeen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_17_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 18
const LessonEightQuestionEighteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionEighteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_18_1');
        const b = handlerInput.t('Lesson_8_Answer_18_2');
        const c = handlerInput.t('Lesson_8_Answer_18_3');
        const d = handlerInput.t('Lesson_8_Answer_18_4');
        const speakOutput = a + b + c + d + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 19
const LessonEightQuestionNineteenHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionNineteen';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_19_1');
        const b = handlerInput.t('Lesson_8_Answer_19_2');
        const c = handlerInput.t('Lesson_8_Answer_19_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 20
const LessonEightQuestionTwentyHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwenty';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_20_1');
        const b = handlerInput.t('Lesson_8_Answer_20_2');
        const c = handlerInput.t('Lesson_8_Answer_20_3');
        const speakOutput = a + b + c + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 21
const LessonEightQuestionTwentyOneHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwentyOne';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_21_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 22
const LessonEightQuestionTwentyTwoHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwentyTwo';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_22_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};
// Question 23
const LessonEightQuestionTwentyTreeHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'LessonEightQuestionTwentyTree';
    },
    handle(handlerInput) {
        const quest = ' Caso você deseja saber mais sobre essa aula, você pode me perguntar, quais as perguntas da aula oito ';
        const a = handlerInput.t('Lesson_8_Answer_23_1');
        const speakOutput = a + quest;
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            .getResponse();
    }
};



const HelpIntentHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.HelpIntent';
    },
    handle(handlerInput) {
        const speakOutput = handlerInput.t('Help');

        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt(speakOutput)
            .getResponse();
    }
};
const CancelAndStopIntentHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest'
            && (Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.CancelIntent'
                || Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.StopIntent'
                || Alexa.getIntentName(handlerInput.requestEnvelope) === 'AMAZON.NoIntent');
    },
    handle(handlerInput) {
        const speakOutput = ' Até mais, e Obrigada por utilizar nossa skill, qualquer coisa é só me chamar.';
        return handlerInput.responseBuilder
            .speak(speakOutput)
            .getResponse();
    }
};
const SessionEndedRequestHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'SessionEndedRequest';
    },
    handle(handlerInput) {
        // Any cleanup logic goes here.
        return handlerInput.responseBuilder.getResponse();
    }
};

// The intent reflector is used for interaction model testing and debugging.
// It will simply repeat the intent the user said. You can create custom handlers
// for your intents by defining them above, then also adding them to the request
// handler chain below.
const IntentReflectorHandler = {
    canHandle(handlerInput) {
        return Alexa.getRequestType(handlerInput.requestEnvelope) === 'IntentRequest';
    },
    handle(handlerInput) {
        const intentName = Alexa.getIntentName(handlerInput.requestEnvelope);
        const speakOutput = `Não consegui entender sua pergunta, você pode tentar novamente? mas dessa vez falando um pouco mais devagar?  ${intentName}`;

        return handlerInput.responseBuilder
            .speak(speakOutput)
            .withShouldEndSession(false)
            //.reprompt('add a reprompt if you want to keep the session open for the user to respond')
            .getResponse();
    }
};

// Generic error handling to capture any syntax or routing errors. If you receive an error
// stating the request handler chain is not found, you have not implemented a handler for
// the intent being invoked or included it in the skill builder below.
const ErrorHandler = {
    canHandle() {
        return true;
    },
    handle(handlerInput, error) {
        console.log(`~~~~ Error handled: ${error.stack}`);
        const speakOutput = `Desculpe, não consegui entender o que você disse. Tente de novo.`;

        return handlerInput.responseBuilder
            .speak(speakOutput)
            .reprompt(speakOutput)
            .getResponse();
    }
};


// Localizador
// This request interceptor will bind a translation function 't' to the handlerInput
// This request interceptor will log all incoming requests to this lambda
const LoggingRequestInterceptor = {
    process(handlerInput) {
        console.log(`Incoming request: ${JSON.stringify(handlerInput.requestEnvelope)}`);
    }
};

// This response interceptor will log all outgoing responses of this lambda
const LoggingResponseInterceptor = {
    process(handlerInput, response) {
        console.log(`Outgoing response: ${JSON.stringify(response)}`);
    }
};

// This request interceptor will bind a translation function 't' to the handlerInput
const LocalisationRequestInterceptor = {
    process(handlerInput) {
        i18n.init({
            lng: Alexa.getLocale(handlerInput.requestEnvelope),
            resources: languageStrings
        }).then((t) => {
            handlerInput.t = (...args) => t(...args);
        });
    }
};


// The SkillBuilder acts as the entry point for your skill, routing all request and response
// payloads to the handlers above. Make sure any new handlers or interceptors you've
// defined are included below. The order matters - they're processed top to bottom.
exports.handler = Alexa.SkillBuilders.custom()
    .addRequestHandlers(
        LaunchRequestHandler,
        AulasHandler,
        EmentaHandler,
        // Aula 1
        TopicLessonOneOneHandler,
        QuestionsOneHandler,
        LessonOneQuestionOneHandler,
        LessonOneQuestionTwoHandler,
        LessonOneQuestionTreeHandler,
        LessonOneQuestionFourHandler,
        LessonOneQuestionFiveHandler,
        LessonOneQuestionSixHandler,
        LessonOneQuestionSevenHandler,
        LessonOneQuestionEightHandler,
        LessonOneQuestionNineHandler,
        LessonOneQuestionTenHandler,
        LessonOneQuestionElevenHandler,
        LessonOneQuestionTwelveHandler,
        LessonOneQuestionThirteenHandler,
        LessonOneQuestionFourteenHandler,
        // Fim Aula 1
        // Aula 2 
        TopicLessonTwoHandler,
        QuestionsTwoHandler,
        LessonTwoQuestionOneHandler,
        LessonTwoQuestionTwoHandler,
        LessonTwoQuestionTreeHandler,
        LessonTwoQuestionFourHandler,
        LessonTwoQuestionFiveHandler,
        LessonTwoQuestionSixHandler,
        LessonTwoQuestionSevenHandler,
        LessonTwoQuestionEightHandler,
        LessonTwoQuestionNineHandler,
        LessonTwoQuestionTenHandler,
        LessonTwoQuestionElevenHandler,
        LessonTwoQuestionTwelveHandler,
        LessonTwoQuestionThirteenHandler,
        LessonTwoQuestionFourteenHandler,
        LessonTwoQuestionFifteenHandler,
        LessonTwoQuestionSixteenHandler,
        LessonTwoQuestionSeventeenHandler,
        LessonTwoQuestionEighteenHandler,
        LessonTwoQuestionNineteenHandler,
        LessonTwoQuestionTwentyHandler,
        LessonTwoQuestionTwentyOneHandler,
        LessonTwoQuestionTwentyTwoHandler,
        LessonTwoQuestionTwentyTreeHandler,
        LessonTwoQuestionTwentyFourHandler,
        LessonTwoQuestionTwentyFiveHandler,
        LessonTwoQuestionTwentySixHandler,
        LessonTwoQuestionTwentySevenHandler,
        LessonTwoQuestionTwentyEightHandler,
        //Fim Aula 2
        // Aula 3 
        TopicLessonTreeHandler,
        QuestionsTreeHandler,
        LessonTreeQuestionOneHandler,
        LessonTreeQuestionTwoHandler,
        LessonTreeQuestionTreeHandler,
        LessonTreeQuestionFourHandler,
        LessonTreeQuestionFiveHandler,
        LessonTreeQuestionSixHandler,
        LessonTreeQuestionSevenHandler,
        LessonTreeQuestionEightHandler,
        LessonTreeQuestionNineHandler,
        LessonTreeQuestionTenHandler,
        LessonTreeQuestionElevenHandler,
        LessonTreeQuestionTwelveHandler,
        LessonTreeQuestionThirteenHandler,
        LessonTreeQuestionFourteenHandler,
        LessonTreeQuestionFifteenHandler,
        LessonTreeQuestionSixteenHandler,
        LessonTreeQuestionSeventeenHandler,
        LessonTreeQuestionEighteenHandler,
        LessonTreeQuestionNineteenHandler,
        LessonTreeQuestionTwentyHandler,
        LessonTreeQuestionTwentyOneHandler,
        LessonTreeQuestionTwentyTwoHandler,
        // Fim aula 3
        // Aula 4 
        TopicLessonFourHandler,
        QuestionsFourHandler,
        LessonFourQuestionOneHandler,
        LessonFourQuestionTwoHandler,
        LessonFourQuestionTreeHandler,
        LessonFourQuestionFourHandler,
        LessonFourQuestionFiveHandler,
        LessonFourQuestionSixHandler,
        LessonFourQuestionSevenHandler,
        LessonFourQuestionEightHandler,
        LessonFourQuestionNineHandler,
        LessonFourQuestionTenHandler,
        LessonFourQuestionElevenHandler,
        LessonFourQuestionTwelveHandler,
        LessonFourQuestionThirteenHandler,
        LessonFourQuestionFourteenHandler,
        //Aula 5
        TopicLessonFiveHandler,
        QuestionsFiveHandler,
        LessonFiveQuestionOneHandler,
        LessonFiveQuestionTwoHandler,
        LessonFiveQuestionTreeHandler,
        LessonFiveQuestionFourHandler,
        LessonFiveQuestionFiveHandler,
        LessonFiveQuestionSixHandler,
        LessonFiveQuestionSevenHandler,
        LessonFiveQuestionEightHandler,
        LessonFiveQuestionNineHandler,
        LessonFiveQuestionTenHandler,
        LessonFiveQuestionElevenHandler,
        LessonFiveQuestionTwelveHandler,
        LessonFiveQuestionThirteenHandler,
        LessonFiveQuestionFourteenHandler,
        LessonFiveQuestionFifteenHandler,
        LessonFiveQuestionSixteenHandler,
        LessonFiveQuestionSeventeenHandler,
        LessonFiveQuestionEighteenHandler,
        LessonFiveQuestionNineteenHandler,
        // Fim aula 5 
        //Aula 6 
        TopicLessonSixHandler,
        QuestionsSixHandler,
        LessonSixQuestionOneHandler,
        LessonSixQuestionTwoHandler,
        LessonSixQuestionTreeHandler,
        LessonSixQuestionFourHandler,
        LessonSixQuestionFiveHandler,
        LessonSixQuestionSixHandler,
        LessonSixQuestionSevenHandler,
        LessonSixQuestionEightHandler,
        LessonSixQuestionNineHandler,
        LessonSixQuestionTenHandler,
        LessonSixQuestionElevenHandler,
        LessonSixQuestionTwelveHandler,
        LessonSixQuestionThirteenHandler,
        LessonSixQuestionFourteenHandler,
        LessonSixQuestionFifteenHandler,
        LessonSixQuestionSixteenHandler,
        LessonSixQuestionSeventeenHandler,
        LessonSixQuestionEighteenHandler,
        LessonSixQuestionNineteenHandler,
        LessonSixQuestionTwentyHandler,
        LessonSixQuestionTwentyOneHandler,
        LessonSixQuestionTwentyTwoHandler,
        LessonSixQuestionTwentyTreeHandler,
        LessonSixQuestionTwentyFourHandler,
        //
        // Aula 7 
        TopicLessonSevenHandler,
        QuestionsSevenHandler,
        LessonSevenQuestionOneHandler,
        LessonSevenQuestionTwoHandler,
        LessonSevenQuestionTreeHandler,
        LessonSevenQuestionFourHandler,
        LessonSevenQuestionFiveHandler,
        LessonSevenQuestionSixHandler,
        LessonSevenQuestionSevenHandler,
        LessonSevenQuestionEightHandler,
        LessonSevenQuestionNineHandler,
        LessonSevenQuestionTenHandler,
        LessonSevenQuestionElevenHandler,
        LessonSevenQuestionTwelveHandler,
        LessonSevenQuestionThirteenHandler,
        LessonSevenQuestionFourteenHandler,
        LessonSevenQuestionFifteenHandler,
        LessonSevenQuestionSixteenHandler,
        LessonSevenQuestionSeventeenHandler,
        // Fim aula 7 
        //Aula 8
        TopicLessonEightHandler,
        QuestionsEightHandler,
        LessonEightQuestionOneHandler,
        LessonEightQuestionTwoHandler,
        LessonEightQuestionTreeHandler,
        LessonEightQuestionFourHandler,
        LessonEightQuestionFiveHandler,
        LessonEightQuestionSixHandler,
        LessonEightQuestionSevenHandler,
        LessonEightQuestionEightHandler,
        LessonEightQuestionNineHandler,
        LessonEightQuestionTenHandler,
        LessonEightQuestionElevenHandler,
        LessonEightQuestionTwelveHandler,
        LessonEightQuestionThirteenHandler,
        LessonEightQuestionFourteenHandler,
        LessonEightQuestionFifteenHandler,
        LessonEightQuestionSixteenHandler,
        LessonEightQuestionSeventeenHandler,
        LessonEightQuestionEighteenHandler,
        LessonEightQuestionNineteenHandler,
        LessonEightQuestionTwentyHandler,
        LessonEightQuestionTwentyOneHandler,
        LessonEightQuestionTwentyTwoHandler,
        LessonEightQuestionTwentyTreeHandler,
        //
        HelpIntentHandler,
        ConfirmationHandler,
        CancelAndStopIntentHandler,
        SessionEndedRequestHandler,
        IntentReflectorHandler, // make sure IntentReflectorHandler is last so it doesn't override your custom intent handlers
        )
       .addRequestInterceptors(
        LocalisationRequestInterceptor,
        LoggingRequestInterceptor)
    .addResponseInterceptors(
        LoggingResponseInterceptor)
    
    .addErrorHandlers(
        ErrorHandler,
    )
    .lambda();
