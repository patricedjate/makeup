<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Inscription - Maîtrisez le maquillage (100% gratuit)</title>
  <meta name="description" content="Inscrivez-vous gratuitement et accédez à des tutoriels de maquillage réalisés par des experts." />
  <style>
    :root{--accent:#d63384;--muted:#6b7280;--bg:#f8fafc;--card:#ffffff}
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background:linear-gradient(180deg,var(--bg),#fff);color:#0f172a;margin:0;line-height:1.45}
    .container{max-width:1100px;margin:40px auto;padding:24px}
    .grid{display:flex;gap:32px;align-items:center}
    .left{flex:1}
    .right{width:420px;background:var(--card);border-radius:12px;padding:22px;box-shadow:0 6px 20px rgba(15,23,42,0.06)}
    h1{font-size:28px;margin:0 0 8px}
    p.lead{color:var(--muted);margin:0 0 16px}
    ul.benef{padding-left:18px;margin:12px 0 20px;color:var(--muted)}
    .badge{display:inline-block;background:rgba(214,51,132,0.1);color:var(--accent);padding:6px 10px;border-radius:999px;font-weight:600;font-size:13px;margin-bottom:12px}
    form label{display:block;font-size:13px;margin-bottom:6px;color:#0f172a}
    input[type=text],input[type=email],input[type=password],select{width:100%;padding:10px 12px;border-radius:8px;border:1px solid #e6e9ee;background:#fff;font-size:14px}
    .row{display:flex;gap:10px}
    .col{flex:1}
    .cta{width:100%;padding:12px;border-radius:10px;border:0;background:var(--accent);color:#fff;font-weight:700;font-size:15px;cursor:pointer}
    .muted-small{font-size:13px;color:var(--muted);margin-top:10px}
    .socials{display:flex;gap:10px;margin-top:12px}
    .btn-soc{flex:1;padding:10px;border-radius:8px;border:1px solid #e6e9ee;background:#fff;display:inline-flex;align-items:center;justify-content:center;gap:8px;cursor:pointer}
    .legal{font-size:12px;color:#94a3b8;margin-top:12px}
    .success{display:none;padding:18px;background:#ecfdf5;border:1px solid #bbf7d0;color:#065f46;border-radius:8px;margin-top:12px}
    @media (max-width:880px){.grid{flex-direction:column}.right{width:100%}}
  </style>
</head>
<body>
  <main class="container">
    <section class="grid">
      <div class="left">
        <span class="badge">Inscription 100% gratuite</span>
        <h1>Rejoignez notre plateforme de maquillage</h1>
        <p class="lead">Apprenez des techniques professionnelles, accédez à des tutoriels pas-à-pas et découvrez les astuces qui vous feront gagner du temps — depuis chez vous.</p>

        <ul class="benef">
          <li>🎥 Tutoriels vidéos guidés par des maquilleurs pros</li>
          <li>💡 Astuces personnalisées selon votre type de peau</li>
          <li>🧑‍🤝‍🧑 Communauté bienveillante et défis beauté</li>
        </ul>

        <p class="muted-small">Aucune carte bancaire requise. Annulation à tout moment. Vos données sont protégées.</p>
      </div>

      <aside class="right" aria-labelledby="inscription-title">
        <h2 id="inscription-title">Inscription gratuite</h2>
        <p class="muted-small">Créez votre compte en moins d'une minute et commencez dès aujourd'hui.</p>

        <form id="signupForm" method="post" action="inscription.php" novalidate>
          <div style="margin-top:12px">
            <label for="fullname">Nom complet</label>
            <input id="fullname" name="fullname" type="text" placeholder="Ex : Marie Dupont" required />
          </div>

          <div style="margin-top:12px">
            <label for="email">Adresse e-mail</label>
            <input id="email" name="email" type="email" placeholder="vous@exemple.com" required />
          </div>

          <div style="margin-top:12px" class="row">
            <div class="col">
              <label for="password">Mot de passe</label>
              <input id="password" name="password" type="password" placeholder="Min. 8 caractères" required />
            </div>
            <div class="col">
              <label for="password2">Confirmer</label>
              <input id="password2" name="password2" type="password" placeholder="Confirmez le mot de passe" required />
            </div>
          </div>

          <div style="margin-top:12px">
            <label for="skin">Type de peau (optionnel)</label>
            <select id="skin" name="skin">
              <option value="">Choisissez...</option>
              <option value="normale">Normale</option>
              <option value="mixte">Mixte</option>
              <option value="grasse">Grasse</option>
              <option value="sèche">Sèche</option>
              <option value="sensible">Sensible</option>
            </select>
          </div>

          <div style="margin-top:14px">
            <label for="goal">Objectif principal</label>
            <select id="goal" name="goal">
              <option value="">Choisissez...</option>
              <option value="débutant">Apprendre les bases</option>
              <option value="perfectionner">Perfectionner ma technique</option>
              <option value="pro">Se professionnaliser</option>
              <option value="looks">Découvrir de nouveaux looks</option>
            </select>
          </div>

          <button type="submit" class="cta" style="margin-top:18px">S'inscrire gratuitement</button>

          <div class="socials">
            <button type="button" class="btn-soc" onclick="social('google')">Continuer avec Google</button>
            <button type="button" class="btn-soc" onclick="social('facebook')">Continuer avec Facebook</button>
          </div>

          <div class="legal">En vous inscrivant, vous acceptez nos <a href="#">Conditions d'utilisation</a> et notre <a href="#">Politique de confidentialité</a>.</div>

          <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="success" role="status">Merci ! Votre compte a bien été créé. Un e-mail de confirmation vous a été envoyé.</div>
          <?php endif; ?>
        </form>
      </aside>
    </section>
  </main>

  <script>
    function social(provider){
      alert('Redirection vers l\'authentification ' + provider + ' (à implémenter).');
    }
  </script>
</body>
</html>
