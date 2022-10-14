class Github {
  constructor() {
    this.client_id = '263ad671a384dbea0077';
    this.client_secret = '7de4964889643f28e92bc7f19835b478b688a094';
    this.repos_count = 5;
    this.repos_sort = 'created: asc';
  }

  async getUser(user) {
    const profileResponse = await fetch(`https://api.github.com/users/${user}?client_id=${this.client_id}&client_secret=${this.client_secret}`);

    const repoResponse = await fetch(`https://api.github.com/users/${user}/repos?per_page=${this.repos_count}&sort=${this.repos_sort}&client_id=${this.client_id}&client_secret=${this.client_secret}`);

    const profileData = await profileResponse.json();
    const repos = await repoResponse.json();

    return {
      profileData,
      repos
    }
  }
}