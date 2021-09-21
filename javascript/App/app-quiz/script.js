const quizData = [
    {
        question : 'Kenapa anda masih melajang ?',
        a : 'Lagi trendi',
        b : '2D lebih HOT daripada 3D',
        c : 'Aku terlalu hebat dimiliki seseorang.',
        d : 'Udah Nasib',
        correct:  'd'
    },
    {
        question : 'What us the most used programing language in 2019?',
        a : 'java',
        b : 'C',
        c : 'Pyton',
        d : 'JavaScript',
        correct:  'a'
    },
    {
        question : 'What is he President Of US?',
        a : 'Florin Pop',
        b : 'Donald Trump',
        c : 'Ivan Saldano',
        d : 'Mihai Andrei',
        correct:  'b'
    },
    {
        question : 'What does HTML stand for?',
        a : 'Hypertext Markup Language',
        b : 'Cascading Style Sheet',
        c : 'Jason Object Notation',
        d : 'Application Programming Interface',
        correct:  'a'
    },
    {
        question : 'What year was JavaScript launched?',
        a : '2020',
        b : '2019',
        c : '2018',
        d : 'non of the above',
        correct:  'd'
    },
];

const quiz = document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const submitBtn = document.getElementById('submit');


let currentQuestion = 0;
let score = 0;

loadQuiz();

function loadQuiz() {
    deselectAnswers();

    const currentQuizData = quizData[currentQuestion];

    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    c_text.innerText = currentQuizData.c;
    d_text.innerText = currentQuizData.d;

}

function getSelected() {
    
    let answer = undefined;

    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer =  answerEl.id;
        }
    });

    return answer;
}


function deselectAnswers() {
    answerEls.forEach(answerEl => {
        answerEl.checked = false;
    });
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected();
    if(answer) {  
        if(answer === quizData[currentQuestion].correct) {
            score++;
            console.log(score);
        }

        currentQuestion++;
        if(currentQuestion < quizData.length) {
            loadQuiz();
        }else {
            // Todo : Show Results
            quiz.innerHTML = `<h2>You answered correctly at ${score}/${quizData.length}</h2>
            <button onClick="location.reload()">Reload</button>`;
        }
    }
    

})