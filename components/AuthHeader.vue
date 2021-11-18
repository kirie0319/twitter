<template>
  <div>
    <div>
      <img src="@/assets/img/logo.png" />
      <nav>
        <ul>
          <li @click="$router.push('register')">新規登録</li>
          <li @click="$router.push('login')">ログイン</li>
        </ul>
      </nav>
    </div>
  </div>
</template>
