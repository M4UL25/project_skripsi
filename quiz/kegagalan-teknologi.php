<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #EBF3E8;
        }

        .card {
            max-width: 600px;
            margin: auto;
            margin-top: 10%;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-container {
            padding: 20px;
        }

        .result {
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-answer {
            width: 100%;
            margin-top: 10px;
        }

        .btn-exit {
            width: 100%;
            margin-top: 20px;
        }

        .exit-container {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body quiz-container row">
            <!-- Input nama -->
            <div id="name-input" class="mb-3">
                <h2 class="mb-4">Quiz Kegagalan Teknologi</h2>
                <label for="inputName" class="form-label">Masukkan Nama Anda:</label>
                <input type="text" class="form-control" id="inputName">
                <button class="btn btn-primary mt-2" onclick="startQuiz()">Mulai Kuis</button>
                <a href="../quiz.php" class="btn btn-danger mt-2">Keluar</a>
            </div>

            <!-- Kuis container (akan muncul setelah input nama) -->
            <div id="quiz" class="" style="display: none;">
                <!-- Soal dan jawaban -->
            </div>

            <!-- Hasil Skor -->
            <div id="results" class="result"></div>

            <!-- Tombol Exit -->
            <div class="exit-container col-sm-4">
                <button id="exitBtn" class="btn btn-danger btn-exit" onclick="exitQuiz()"
                    style="display: none;">Keluar</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentQuestionIndex = 0;
        var score = 0;
        var playerName = "";

        var questions = [
            { //1
                question: "Yang termasuk bencana kegagalan teknologi?",
                answers: [
                    { text: "Konflik", correct: false },
                    { text: "Gempa", correct: false },
                    { text: "Kebakaran Rumah", correct: true },
                    { text: "Wabah", correct: false }
                ]
            },
            { //2
                question: "Apa yang dimaksud dengan bencana kegagalan teknologi?",
                answers: [
                    { text: "Bencana yang disebabkan oleh faktor alam", correct: false },
                    { text: "Bencana yang melibatkan ancaman terhadap teknologi", correct: true },
                    { text: "Bencana yang hanya terjadi di laboratorium", correct: false },
                    { text: "Bencana yang disebabkan oleh perubahan iklim", correct: false }
                ]
            },
            { //3
                question: "Contoh bencana kegagalan teknologi yang melibatkan kerusakan sistem komputer atau jaringan disebut...",
                answers: [
                    { text: "Tsunami", correct: false },
                    { text: "Pencurian identitas", correct: true },
                    { text: "Gempa bumi", correct: false },
                    { text: "Erupsi gunung berapi", correct: false }
                ]
            },
            { //4
                question: "Apakah yang dapat menyebabkan bencana kegagalan teknologi di sektor energi?",
                answers: [
                    { text: "Peningkatan efisiensi sistem", correct: false },
                    { text: "Pemadaman listrik massal", correct: true },
                    { text: "Perawatan rutin peralatan", correct: false },
                    { text: "Implementasi energi terbarukan", correct: false }
                ]
            },
            { //5
                question: "Apa yang dapat dilakukan untuk mengurangi risiko bencana kegagalan teknologi dalam bisnis?",
                answers: [
                    { text: "Tidak melakukan pembaruan perangkat lunak", correct: false },
                    { text: "Mengadopsi praktik keamanan yang ketat dan melakukan backup data secara berkala", correct: true },
                    { text: "Mengabaikan keamanan siber", correct: false },
                    { text: "Meningkatkan penggunaan teknologi terbaru tanpa evaluasi risiko", correct: false }
                ]
            },
            { //6
                question: "Bagaimana peran pelatihan karyawan dalam mengurangi dampak bencana kegagalan teknologi di tempat kerja?",
                answers: [
                    { text: "Tidak berpengaruh", correct: false },
                    { text: "Meningkatkan pemahaman karyawan untuk respons dan pemulihan", correct: true },
                    { text: "Meningkatkan risiko kegagalan teknologi", correct: false },
                    { text: "Menyebabkan bencana", correct: false }
                ]
            },
            { //7
                question: "Apa yang dapat dilakukan untuk mengatasi risiko keamanan siber dalam kegagalan teknologi?",
                answers: [
                    { text: "Tidak menginstal perangkat lunak keamanan", correct: false },
                    { text: "Mengimplementasikan kebijakan keamanan yang ketat dan melakukan pembaruan secara teratur", correct: true },
                    { text: "Menggunakan kata sandi yang sama untuk semua akun", correct: false },
                    { text: "Membiarkan sistem operasi dan perangkat lunak usang", correct: false }
                ]
            },
            { //8
                question: "Apa yang dapat menjadi penyebab bencana kegagalan teknologi di sektor transportasi?",
                answers: [
                    { text: "Pemeliharaan rutin kendaraan", correct: false },
                    { text: "Kerusakan peralatan navigasi", correct: true },
                    { text: "Keamanan jalan yang tinggi", correct: false },
                    { text: "Penggunaan transportasi berbasis energi terbarukan", correct: false }
                ]
            },
            { //9
                question: "Bagaimana peran regulasi dan kebijakan dalam mengurangi risiko bencana kegagalan teknologi?",
                answers: [
                    { text: "Meningkatkan risiko dengan menghilangkan batasan", correct: false },
                    { text: "Memberikan panduan dan standar untuk keselamatan dan keamanan", correct: true },
                    { text: "Tidak berpengaruh pada keberlanjutan teknologi", correct: false },
                    { text: "Menghambat inovasi", correct: false }
                ]
            },
            { //10
                question: "Apa yang dapat dilakukan untuk meningkatkan ketangguhan sistem teknologi terhadap bencana alam?",
                answers: [
                    { text: "Tidak melakukan cadangan data", correct: false },
                    { text: "Mengadopsi teknologi tahan bencana dan memiliki rencana pemulihan", correct: true },
                    { text: "Meningkatkan infrastruktur tanpa evaluasi risiko", correct: false },
                    { text: "Tidak melakukan tes pemulihan bencana", correct: false }
                ]
            },
            { //11
                question: "Apa yang dimaksud dengan bencana kegagalan teknologi?",
                answers: [
                    { text: "Bencana yang disebabkan oleh faktor alam", correct: false },
                    { text: "Bencana yang melibatkan ancaman terhadap teknologi", correct: true },
                    { text: "Bencana yang hanya terjadi di laboratorium", correct: false },
                    { text: "Bencana yang disebabkan oleh perubahan iklim", correct: false }
                ]
            },
            { //12
                question: "Contoh bencana kegagalan teknologi yang melibatkan kerusakan sistem komputer atau jaringan disebut...",
                answers: [
                    { text: "Tsunami", correct: false },
                    { text: "Pencurian identitas", correct: true },
                    { text: "Gempa bumi", correct: false },
                    { text: "Erupsi gunung berapi", correct: false }
                ]
            },
            { //13
                question: "Apakah yang dapat menyebabkan bencana kegagalan teknologi di sektor energi?",
                answers: [
                    { text: "Peningkatan efisiensi sistem", correct: false },
                    { text: "Pemadaman listrik massal", correct: true },
                    { text: "Perawatan rutin peralatan", correct: false },
                    { text: "Implementasi energi terbarukan", correct: false }
                ]
            },
            { //14
                question: "Apa yang dapat dilakukan untuk mengurangi risiko bencana kegagalan teknologi dalam bisnis?",
                answers: [
                    { text: "Tidak melakukan pembaruan perangkat lunak", correct: false },
                    { text: "Mengadopsi praktik keamanan yang ketat dan melakukan backup data secara berkala", correct: true },
                    { text: "Mengabaikan keamanan siber", correct: false },
                    { text: "Meningkatkan penggunaan teknologi terbaru tanpa evaluasi risiko", correct: false }
                ]
            },
            { //15
                question: "Bagaimana peran pelatihan karyawan dalam mengurangi dampak bencana kegagalan teknologi di tempat kerja?",
                answers: [
                    { text: "Tidak berpengaruh", correct: false },
                    { text: "Meningkatkan pemahaman karyawan untuk respons dan pemulihan", correct: true },
                    { text: "Meningkatkan risiko kegagalan teknologi", correct: false },
                    { text: "Menyebabkan bencana", correct: false }
                ]
            },
            { //16
                question: "Apa yang dapat dilakukan untuk mengatasi risiko keamanan siber dalam kegagalan teknologi?",
                answers: [
                    { text: "Tidak menginstal perangkat lunak keamanan", correct: false },
                    { text: "Mengimplementasikan kebijakan keamanan yang ketat dan melakukan pembaruan secara teratur", correct: true },
                    { text: "Menggunakan kata sandi yang sama untuk semua akun", correct: false },
                    { text: "Membiarkan sistem operasi dan perangkat lunak usang", correct: false }
                ]
            },
            { //17
                question: "Apa yang dapat menjadi penyebab bencana kegagalan teknologi di sektor transportasi?",
                answers: [
                    { text: "Pemeliharaan rutin kendaraan", correct: false },
                    { text: "Kerusakan peralatan navigasi", correct: true },
                    { text: "Keamanan jalan yang tinggi", correct: false },
                    { text: "Penggunaan transportasi berbasis energi terbarukan", correct: false }
                ]
            },
            { //18
                question: "Bagaimana peran regulasi dan kebijakan dalam mengurangi risiko bencana kegagalan teknologi?",
                answers: [
                    { text: "Meningkatkan risiko dengan menghilangkan batasan", correct: false },
                    { text: "Memberikan panduan dan standar untuk keselamatan dan keamanan", correct: true },
                    { text: "Tidak berpengaruh pada keberlanjutan teknologi", correct: false },
                    { text: "Menghambat inovasi", correct: false }
                ]
            },
            { //19
                question: "Bagaimana peran edukasi masyarakat dalam penanggulangan bencana kegagalan teknologi?",
                answers: [
                    { text: "Tidak berpengaruh", correct: false },
                    { text: "Meningkatkan pemahaman masyarakat tentang penggunaan teknologi yang aman", correct: true },
                    { text: "Meningkatkan risiko kegagalan teknologi", correct: false },
                    { text: "Menyebabkan kegagalan sistem", correct: false }
                ]
            },
            { //20
                question: "Apakah perencanaan darurat dan latihan simulasi bencana teknologi diperlukan dalam penanggulangan bencana kegagalan teknologi?",
                answers: [
                    { text: "Tidak diperlukan, karena tidak mungkin terjadi bencana kegagalan teknologi", correct: false },
                    { text: "Sangat diperlukan untuk meningkatkan kesiapan dan respons cepat", correct: true },
                    { text: "Diperlukan untuk melibatkan masyarakat dalam kegiatan yang tidak berguna", correct: false },
                    { text: "Tidak berpengaruh pada pemulihan sistem", correct: false }
                ]
            },
            // Tambahkan soal dan jawaban lainnya sesuai kebutuhan
        ];

        function startQuiz() {
            playerName = document.getElementById("inputName").value;
            if (playerName.trim() === "") {
                alert("Masukkan nama Anda terlebih dahulu.");
                return;
            }

            var shuffledQuestions = shuffle(questions);
            showQuestion(shuffledQuestions[currentQuestionIndex]);

            document.getElementById("name-input").style.display = "none";
            document.getElementById("quiz").style.display = "block";
            document.getElementById("exitBtn").style.display = "block";
        }

        function shuffle(array) {
            return array.sort(() => Math.random() - 0.5);
        }

        function showQuestion(question) {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var questionElement = document.createElement("div");
            questionElement.className = "mb-3";
            questionElement.innerText = question.question;
            quizContainer.appendChild(questionElement);

            var shuffledAnswers = shuffle(question.answers);

            shuffledAnswers.forEach(function (answer) {
                var button = document.createElement("button");
                button.innerText = answer.text;
                button.className = "btn btn-primary btn-answer";
                button.addEventListener("click", function () {
                    selectAnswer(answer, shuffledAnswers);
                });
                quizContainer.appendChild(button);
            });
        }

        function selectAnswer(selectedAnswer, shuffledAnswers) {
            if (selectedAnswer.correct) {
                score++;
            }

            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(questions[currentQuestionIndex]);
            } else {
                endQuiz();
            }
        }

        function endQuiz() {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var resultsContainer = document.getElementById("results");
            resultsContainer.innerHTML = "<h2 class='text-center m'>Hasil Kuis</h2>";
            resultsContainer.innerHTML += "<h2 style='text-transform: capitalize'>Nama: " + playerName + "</h2>";
            resultsContainer.innerHTML += "<h2>Skor Anda: <strong> " + score + "/" + questions.length + "</strong> </h2>";
        }

        function exitQuiz() {
            var confirmExit = confirm("Apakah Anda yakin ingin keluar dari kuis?");
            if (confirmExit) {
                window.location.href = "../quiz.php";
            }
        }
    </script>

</body>

</html>