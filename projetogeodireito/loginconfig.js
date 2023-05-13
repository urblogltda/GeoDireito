$(".talktous").click(function (e) {
    $("#modalinfo").modal("show");

})
$("#submit").click(function (e) {
  e.preventDefault();
  usuario = $("#usuario").val();
  senha = $("#senha").val();
  $.ajax({
    type: "POST",
    data: {
      usuario: usuario,
      senha: senha,
    },
    url: "adjustdatabase.php",
    success: function (result) {
      /* console.log(result);
      resultado = JSON.parse(result);
      console.log(result); */
      location.reload();
    },
    error: function (result) {
      console.log(result);
    },
  });
});

$("#deslogar").click(function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Você deseja deslogar dessa conta?",
    showCancelButton: true,
    confirmButtonText: "Sim",
    cancelButtonText: `Não`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "deslogar.php",
        success: function (result) {
          location.reload();
        },
        error: function (result) {
          console.log(result);
        },
      });
    }
  });
});
$("#registerfrommodal").click(function (e) {
  e.preventDefault();
  nomeregister = $("#nomeregister").val();
  emailregister = $("#emailregister").val();
  usuarioregister = $("#usuarioregister").val();
  senharegister = $("#senharegister").val();
  repetesenharegister = $("#repetesenharegister").val();
  nivel = $("#nivel").val();
  $.ajax({
    type: "POST",
    data: {
      nome: nomeregister,
      email: emailregister,
      usuario: usuarioregister,
      senha: senharegister,
      repeatsenha: repetesenharegister,
      nivel: nivel,
    },
    url: "checkregistration.php",
    success: function (result) {
      if (jQuery.trim(result) != "") {
        console.log(jQuery.trim(result).split(" "));
        checker = jQuery.trim(result).split(" ");
        $(".warning").remove();
        if (checker[1] == "Vazio") {
          $("#" + checker[0]).focus();
          $("#error").append(
            "<div class='subtitle warning'>Preencha o campo " +
              checker[2] +
              "</div>"
          );
        }
        if (checker[1] == "Inválido" || checker[1] == "Inválida") {
          $("#" + checker[0]).focus();
          $(".warning").remove();
          if (checker[2] == "Nome") {
            $("#error").append(
              "<div class='subtitle warning'>" +
                checker[2] +
                " " +
                checker[1] +
                "<br><br> Somente letras são aceitas.</div>"
            );
          }
          if (checker[2] == "Usuário") {
            $("#error").append(
              "<div class='subtitle warning'>" +
                checker[2] +
                " " +
                checker[1] +
                "<br><br> Não são aceitos carácteres especiais.</div>"
            );
          }
          if (checker[2] == "Email") {
            $("#error").append(
              "<div class='subtitle warning'>" +
                checker[2] +
                " " +
                checker[1] +
                "</div>"
            );
          }
          if (checker[2] == "Senha") {
            if (checker[3] == "menor") {
              $("#error").append(
                "<div class='subtitle warning'>" +
                  checker[2] +
                  " " +
                  checker[1] +
                  "<br><br> Senhas deve ter no minimo 6 carácteres.</div>"
              );
            } else {
              $("#error").append(
                "<div class='subtitle warning'>" +
                  checker[2] +
                  " " +
                  checker[1] +
                  "<br><br> Senhas não correspondem.</div>"
              );
            }
          }
        }
        if (checker[1] == "duplicate") {
          $("#error").append(
            "<div class='subtitle warning'>Usuário já existe.</div>"
          );
        }
      } else {
        Swal.fire({
          title:
            "<strong>Registro de Usuário</strong><br>Verifique abaixo se as informações inseridas estão corretas.",
          icon: "info",
          html:
            "<strong>Nome : </strong> " +
            nomeregister +
            "<br><strong>Email : </strong> " +
            emailregister +
            "<br><strong>Usuário : </strong> " +
            usuarioregister +
            "<br><strong>Nível : </strong> " +
            nivel,
          showCancelButton: true,
          confirmButtonText: "Cadastrar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "POST",
              data: {
                nome: nomeregister,
                email: emailregister,
                usuario: usuarioregister,
                senha: senharegister,
                repeatsenha: repetesenharegister,
                nivel: nivel,
              },
              url: "registeruser.php",
              success: function (result) {
                location.reload();
              },
              error: function (result) {
                console.log(result);
              },
            });
          }
        });
      }
    },
    error: function (result) {
      console.log(result);
    },
  });
});
