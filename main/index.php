<?php
$title = "Home - SGexplore";
include "header.php";
?>

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2>Discover places near you</h2>
                        <h4>This is the best guide of your city</h4>
                    </div>
                    <!-- Hero Search Form -->
                    <div class="hero-search-form">
                        <!-- Tabs -->
                        <div class="nav nav-tabs" id="heroTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Places</a>
                            <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Events</a>
                        </div>
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>What are you looking for?</h6>
                                <form action="#" method="get">
                                    <select class="custom-select">
                                        <option selected>Your Destinations</option>
                                        <option value="1">New York</option>
                                        <option value="2">Latvia</option>
                                        <option value="3">Dhaka</option>
                                        <option value="4">Melbourne</option>
                                        <option value="5">London</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>All Catagories</option>
                                        <option value="1">Catagories 1</option>
                                        <option value="2">Catagories 2</option>
                                        <option value="3">Catagories 3</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                                <h6>What are you looking for?</h6>
                                <form action="#" method="get">
                                    <select class="custom-select">
                                        <option selected>Your Destinations</option>
                                        <option value="1">New York</option>
                                        <option value="2">Latvia</option>
                                        <option value="3">Dhaka</option>
                                        <option value="4">Melbourne</option>
                                        <option value="5">London</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>All Catagories</option>
                                        <option value="1">Catagories 1</option>
                                        <option value="2">Catagories 2</option>
                                        <option value="3">Catagories 3</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Social Btn -->
        <div class="hero-social-btn">
            <div class="social-title d-flex align-items-center">
                <h6>Follow us on Social Media</h6>
                <span></span>
            </div>
            <div class="social-btns">
                <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
            </div>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Catagory Area Start ***** -->
    <section class="dorne-catagory-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="all-catagories">
                        <div class="row">
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
							<a href="hawkercentres.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="catagory-content">
                                        <img src="data:image/png;base64,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" alt="">
                                            <h6>Hawker Centres</h6>
                                    </div>
                                </div>
							</a>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
							<a href="historicsites.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                                    <div class="catagory-content">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAxCAYAAABznEEcAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADiAAAA4gB2HI2lgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAASKSURBVGiB7ZrLbxVVHMe/py2tgBYSCS26IAgUpKXhio1GF9boxld8LdSFiYiGRP8Du1BiRHzWV4zxsdClCUQ3xhg14iNxQSlgJA0GJTEmKoFQpK209H5czG/odDr3ztyZ0ykLv8nNuXfOOd/f93vnzHmOVAdAK9Bcr8xFDWAJ8Afw4UJrSUNLnbwr7LMljQRwkjZL6pfUJ6lL0hpJyyS1SpqUdEbScUm/SDogaZ+kYefc+dzqMwhbR4BDKWWeA46TjHHglKVJ+At4E6iUbgLoBfYC0xFBPwEvAXcCG4C2WJ02oAu4DdgF7I8Z+hy4bt5NAIuBF4Epy/sHeAXoyRljLfAMcML4poF3geXzYgKoAEfs2qSJX+Ep1lJgINLsjnlpYlETwD2RAENAtwftSTHXAt9anHHg7qKEoYkx4Lx9fzve1lM4VgFbgVUN1GkGdgJVa7YP53OgWSZC7DVB8c9moLUGx4DVHcgRf5uZmALu8mWiHnb7NmH1t9sdGQN6a5WrN9iNS/oyQ6yqpG8a1JcJzrkPgKskPSXpY+Ba59zZ+YhVE0XvhHE0A/uM5/WkMk35JZYD59y0pEclTUh6EtgaLzPHBEH/f3sJ+jLDOXdM0m5JzZKerlsY6LYH6QSwuGhwH80pwtVOMA+rEpshxO/EE5KcpPeccxNFA/uEc+6MpHcU6NsezbtgAmiSdJ/9fL80dY3hI0sfIrJYi96JPkmdkn52zv1aprKscM6NSDosqUPSNeH1qIl+Sz8rT1YuhGNXf3ghaiIcEfeXpSYnvrf0QlebZKLmSu4iwYilG8ILUROdlv7uMWBzLPWB3yxdPSeHYKEz6SsSwVJ01MaJUWC9R+5zwFT4u8kutklaJMnn5OoWSe32vV3SzR65xyW1zFoCAI5g4eNlgAM6mVnKAkwAXT64jX/WnYhmnLaAiQucBgJ0RAwMAY8BG4twxvgvMe5TSZmHLPPqAgGuBI4az4/AskKKk2P0GP+B8Fq0dzpqaa5/DeiQ9IWk9ZIOSrrDOTeaV2wdhPpCvbNMDFl6Y6OswEpJX0napMDArc65kzlFpiHUNzQnB7g+fpuyAFhJsPsHMAxc7kNpnXiHLVZfUmYL8LcVyNSnW6/2g9U5WIKBjRbrT2odOQBvWKFnGyC+AfgOT7uBKbF2mb7BeoV6CVZOJ4H2mgUXAMByGwaqpO1AAp+a250l6cuEyF3Yk6XwFoLRexxYU4K+VBBs5P1LsBuYbQc+8mx8XfMBKgnM3nd6tZGKl0VG3gVtVgQnUQAjwKWNVq4QTNyqwLZ50pimIdNebBrJvfZ8TAGPe9aYFnsHRXfFI2SPMHM+8TJQbxO6MIBFwKDFK3Y+ESO+33oHbGBb54V4bpyuyAyg+ElRQoCKPVyYoefxNM0AVhAcaJ4z/iO5n4EMwZZak4qeng4Cm3LydQOvAWeNbxJ4AVjiW3tS8B7gE+s5QgyZoQdIOAIjOMfuBR404cORulVgDwUWZEXMVIC3mJn9xjFGtjcKUl+9qAfnyUyLgr3RmyRVFLzbsVrBLsfCvdvxP0rGf7zIxSz8MNl/AAAAAElFTkSuQmCC" alt="">
                                            <h6>Historic Sites</h6>
                                    </div>
                                </div>
							</a>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
							<a href="tourismplace.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.6s">
                                    <div class="catagory-content">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAxCAYAAABznEEcAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADiAAAA4gB2HI2lgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAASfSURBVGiB7ZpdiBZ1FMafo+4a5VJ+RpqG9mGGCpURWBddhNkXRclKbVBRF3ZRQRR0lxFUN13EikWUoFdtdqV1YeWdSUSaUZnfpZSLopau26a77q+LOcNO47wz8593XhfCB17Ozsx5zsf8P+bMmZUu4n8IYBKwAlgP/Ab0E+E08C3wMnD5aMeZCeAK4B3gH/6Ls8AJYDBxrhd4BXgAuGy0Y5ckAQuA/Yk7/j5wNzA1oTMGuBP4KpXkALAKmDyaCcwHjntAG4AZJTj3AS8BnwJnnLsPmHkhYk4H0wEc8CC6AatgYxawxW1sAdpaEWteAKvc+SZgTBN2JgC73NaLdcZY5Hi2L9oB4Joa7N2TWPTtdcRYxulKd7q6JnuWGI2lofzgaeBzv8sP14Xys2BmSNrgh/fWYTMXwK1+x/ZXWcw5dh90u1+HcqssyNtdfuF3sC784HJuKLFKEotcbqvAzcNhScOSJgLjQohVkljo8vsK3IYwsyFJfyqKaVIIt0oS8Za6rwK3CEdcTgkhBSXhe/hkSf1mdjKEWxKnXAYVhqEjcaUkUzR/W4FBl0FxhSbR4bIVoyBJQy7HhpBCk4iHuT+QVxYXZCTiKnMwV6s6BlyODyGFJnHa5YRAXkvthyYRz9mgh1EA4iQ6crVSCE3iapcnAnll8avLW1piHWgDdniR9mqLfFwPDAEngaDRKOtggSfwR6teI72hsNP9LCxmhDu4FDjmDrYCjwOzarDbDtxM1Mb52e0fBi4payPofQC4S1KPpGmJ08cl7ZF0VNLvkjaa2aYcG0slPSRppqI6bK5Gtm5J2i3pETPbGRJbEPzF/kng40S3I4nuAn53Sn8Q+BFYCzwaWobXAk/qusR7d9kkVhK1bJpuDDSdtZmdlrQPOBhIPWhmh5r1L1V7nzgPwBRJT/vh3wXq8fWnGM32ZQxgJvAGcDSx/V5VwJlB1F8COOL8C9vCJOoRLSHqvQ4lFuiGssH4WtiY4A45fwk1dlCyHLcDzyb2coi64GuBRcUWMm3eBqxj5DsGwE/AM3Us+LSzTuBQwtF+4HkalAZEH1veJerTfunyLWBiA/0O4AVGPhEAHASW1RF8G/BRwvA2or08980L+IRs9BTwxgLLgO0JzodULXOAccDnbugY8ESj+Qp0AZuB7/w3DPwFLCbqGC4mKuqGEzqbgcca2DP3F5c5n1HlIQi87Qb2AHNy9G4CzmXc9ZUpvdczdIaAeTm257h/gDdDE7jWAzsF3FCg2+lO1rvT+Dc+pTc+dX298zoL7N8I9Hk8s7N0Gj3snvNrq81sT54TjRSRfWZ2IP5JOut3/xvgNTM7k7rel+JnGzfbJek9j2dFQSwjICrIyBvqhO5y112TOh93uWPcn7q+xs8vL+FjvuvuyLp+3kj4NJirqDzYXeQgB1NTx9MytcrhF0WdkHlkPD+yptNkRfV9r5kNN+G4R9JW/3uLH1eCmZ1T1HVsV0afNm/baurbg5n1S7oD6DCzvkJCMRrGU8cLSNzJ7gIezvROpv+4m9hbQwznOZzui2hvSX0jeqom//WhDAaBDyhZ8AF7nTe9uQwvonX4F7bHYdpKzFBxAAAAAElFTkSuQmCC" alt="">
                                            <h6>Tourism Place</h6>
                                    </div>
                                </div>
							</a>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
							<a href="monuments.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.8s">
                                    <div class="catagory-content">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAxCAYAAABznEEcAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADiAAAA4gB2HI2lgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAVSSURBVGiB7Zl7aJZVHMe/x7XVNmeuUsMsvFCZhHnpgohdlDCJApsWgREmpkaEBgoGXaigQIkgEor8w6JSuqGWI8mkJDLQUksszU1pytRdsNdJ6bZPfzy/V4/Pnvfd87zvs80/+v5z3vP93c85z9k5Z1KRAKYBrUALsB/4HFgCXF+s714DMJVodALfArf2dY6xAGyzxF8DFgOfAf8a1wGsAMr6Os+8AO62hGs9bgjwKnDGZF8Cl/VFcuVAdZxRBH610R8Q4scDB62Qb4BLey7jrkn1B5os+BlgN/C2fQP9IvRXmu60CNm1wJ/ZJdc7FQSBS4E9OT7a34BZIf0FJluUw99Ym6l24I7eqSIIPNxmowN40ka7wStmEzDQdOcbtyyPv5dMZ3OvFWGBF1rgFdYvBR4Djhm/A6gEnrH+/Dy+KoFmgu33pt4sohw4BWSACo8fCuyyxN8DVtvvB7rx97rprez57C8MvNECzwjxw4DjttyyMzOiG18TTe+XtPLrssvkwC5rJ/ikc65B0mrzM1hSvXOuPoavk5LGAtUJcs2JuEUctvbqCNkX3u9uP1jnXIekPRZ7VMz4eRG3iFPWVkXIGr3f62L6O27toJj6eRG3iIy1UUUMtvaopO9i+ssOyoC8WjGRRhE11q51znXG9JedgVN5tWIibhGnra3wScBJetS6axPEHWrtoQQ2xcHbFn8I8eOM35/A1yA7ejQDl6SRX9yZOJdDqH+/tZsS+KiRVCJpo3OuPWH8SCQtIowp1n4fR5ngPrHcuh8UGTsZvOW0LcQ32jko1lYJvGx+tqSZX9I1eW45AUMkDZHU4Jw70a0hTJb0nKSzkp7NoTNS0kRJ1Qr+wG5Ja8kJmBCeCeDmqNnJYX85UG/6L0bIqwnu5R1ciN+B29MqYrQ53elxU4zbEMP+XdPdDpSGZP05f/lqBN4B3vS4DGkc24FrsiPjcTOM+7Qb23G2pXYCy4FlwOPYXRx4w/xsBao8u37Axyb7Ko0iyoCzNirOuDstQN6dCXifaLQATwF/E9zhuxzhCa60mLw8jUL2mcNh1h9l/YN5bKqA06bXDqwFXgC+DhVUG2E7G/jL04k6QScu4iNz9rD1HXDSlsmwHDaTzeYscE9ItsBL8JWQ7C6CjzxD8CA3s+gCzPEcC7jG4z4x7ukcNvNMHnlEJ3g1AVgY4muNX5BK8p7jK2xptAFXGjfTgu0FSiJslpo88q0JWG/yBz1uhM1CK96dPh9iHzuccy0KjgoVkrLPMhsk1UkaI+mJCLND1t4WUUCppPHWPeCJHrG81jnnToftioaNUput8UnG1dhoNhN6zif4sE+YfDHnd7YyYJXxO0I2u42fmnoBXpAlFuQEMNa4D43bl11qnv5DBDsTBP+/WA8csX4GuMXTneHpdVmeaRbhCN6ZINidaggexX407g/ghpDNfcABLsT27CCYThnws8nm9lgBXsASzv+lBdgMzAJ+sn4LwYtgWchuDMGD9PAQX0nwHyaAnYSOJj1dzCyCx7MsjoZGux54Hhidw34QsAio8/SHJ83DFZh8laQ1kq6T1F/SjTHMWhQ81bRZf6C6vjsdlrRd0jznXJt6EsC99CwmJ8mn0It6dufYKmlpgT6i8JakSUp4bS72taHVObeze7V4AE4WYldsEdPJc4otAAWdVAstokHBXblS0sgCfeTCP5KOJDEoaHeSJOAqSbMlrZK0Xjku/zGxStJ0SXMlbbBzWmwUvJycc03AMetmnHN1hfoCsttpY9ICpOIfzy4K/F/ExYJUXqUlzQHmpOQrMYqdib2SWtNIRFKTpH2FGP4HSMii1R/TGSsAAAAASUVORK5CYII=" alt="">
                                            <h6>Monuments</h6>
                                    </div>
                                </div>
							</a>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-md">
							<a href="museums.php">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="1s">
                                    <div class="catagory-content">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAxCAYAAABznEEcAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADiAAAA4gB2HI2lgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAOOSURBVGiB7ZkxaF1VGMd/p0nTpmhiQ5W2JARqNKDpIAhSHLSkqEtwEhy61KHYEnRSOzppurhUhA52UIfQRShdOig6CAZdio0gbS0Sq9GISWNotCH+HO53k5vne8mLie+9hvdfDuc75/+d/3fu/c6997vQxBaH2queU+fU99XeemuqGuoB9by66Eoshv1AvTVWhNqljsTOq86r76iPRDsf9jn1bbWr3pqXoO4uI35E3VMyb0/Yi8GMqLvrpR21I0TMhqgF9azaswavJ+YtBG82/HTUSjtqu/qGOlW41z9Q+9fppz94ee5Mhd+d/5d21Fb1uDpRSNbz6sAG/Q6EnxwTsU7rZmlHbQmnNwoLfaoe2rRFsnUOhd8cN2Ldlo04TeoL6njB8VfqkU3UXm7dI+rXhTWvhI60XkdD6ljB0eWwrc/Rf0Rs4FCsm+PLqjZQPaheLBBvqifU7TXQXk5Pm3pS/amg6aJ6cDXCrZj4m/qauqvGustC3aW+HrpUZ9S2chM7CwF01kHrmgiNeSBLGssdY9uAZ9TaqVsftpUalhJVvQf4o6ZyNoZ7U0pzULgSKaU59RQwABwFZoHRVZz0As8C14FPgH7gKWAc+GIV3pPAo8DnwHfAIPAgcAn4YRXei0AH8BHwTR5AWaj74567uorD/BhWHY3+seifWYN3JuYdi/5o9IfW4F2NeftLx8rlxO/AAtCtvgL8WcFvfmZPRvtLtIfV46voORztz9H+Gu1RdV8Fzk6gG7gT+taGetrqMK0+HJztZk/0ajBmvBuZvQjOVMl7q5zesk9gsyfzy8B7wBRwrjDcS3Z/jgPPp5SuF3idwLtkOTUGfFbgPQ08AXwIDKeUZgu8h4CPyXJllJW58RJwP3ACOJtSqv7YVPsi+ssl9sGwX6jAG47x0yX2/OoOV+BdiPHBEnv+6tFXSeu/zty7Ec0gGgXNIBoFzSAaBc0gGgXNIBoFzSAaBc0gGgVbIohiyeYx4E1gL9AC7CCrfNwBfixw2oF9wC3gWhmfDwA9wAwrv4e7gPuACZa/q4voAzrJvr3nC/ZuoA24AvwF/E1WJTmVUrpZGsQ1stLJ3YJLKaXnIIJQ24HbwDTweB2FVYMdwLfAdEqpC5ZLNvkVWUwpfV8PZdXC5Qr9Uj6XJnZN/j9sNloBUkq31Ulgr1pdcap+yDd6qaxTrACeJKsv1e+/cvWYBF6tt4gmtiT+AbXYwWohvydqAAAAAElFTkSuQmCC" alt="">
                                            <h6>Museums</h6>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Catagory Area End ***** -->

    <!-- ***** About Area Start ***** -->
    <section class="dorne-about-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content text-center">
                        <h2>Discover Singapore with <br><span>SGexplore</span></h2>
                        <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce quis tempus elit. Sed efficitur tortor neque, vitae aliquet urna varius sit amet. Ut rhoncus, nunc nec tincidunt volutpat, ex libero.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area End ***** -->

    <!-- ***** Editor Pick Area Start ***** -->
    <section class="dorne-editors-pick-area bg-img bg-overlay-9 section-padding-100" style="background-image: url(img/bg-img/hero-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Cities you must see</h4>
                        <p>Editor’s pick</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.2s">
                        <img src="img/bg-img/editor-1.jpg" alt="">
                        <div class="editors-pick-info">
                            <div class="places-total-destinations d-flex">
                                <a href="#">New York</a>
                                <a href="#">1643 Destinations</a>
                            </div>
                            <div class="add-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.4s">
                        <img src="img/bg-img/editor-2.jpg" alt="">
                        <div class="editors-pick-info">
                            <div class="places-total-destinations d-flex">
                                <a href="#">Barcelona</a>
                                <a href="#">943 Destinations</a>
                            </div>
                            <div class="add-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.6s">
                        <img src="img/bg-img/editor-3.jpg" alt="">
                        <div class="editors-pick-info">
                            <div class="places-total-destinations d-flex">
                                <a href="#">paris</a>
                                <a href="#">243 Destinations</a>
                            </div>
                            <div class="add-more">
                                <a href="#">+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Editor Pick Area End ***** -->

    <!-- ***** Features Destinations Area Start ***** -->
    <section class="dorne-features-destinations-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Featured destinations</h4>
                        <p>Editor’s pick</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="features-slides owl-carousel">
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-1.jpg" alt="">
                            <!-- Price -->
                            <div class="price-start">
                                <p>FROM $59/night</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Ibiza</h5>
                                    <p>Party</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-2.jpg" alt="">
                            <!-- Price -->
                            <div class="price-start">
                                <p>FROM $59/night</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Paris</h5>
                                    <p>Luxury</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-3.jpg" alt="">
                            <!-- Price -->
                            <div class="price-start">
                                <p>FROM $59/night</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Lake Como</h5>
                                    <p>Spectacular</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-4.jpg" alt="">
                            <!-- Price -->
                            <div class="price-start">
                                <p>FROM $59/night</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Greece</h5>
                                    <p>Sunny</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-5.jpg" alt="">
                            <!-- Price -->
                            <div class="price-start">
                                <p>FROM $59/night</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Norway</h5>
                                    <p>All Year round</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Destinations Area End ***** -->

    <!-- ***** Features Restaurant Area Start ***** -->
    <section class="dorne-features-restaurant-area bg-default">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Featured Restaurants</h4>
                        <p>Editor’s pick</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="features-slides owl-carousel">
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-6.jpg" alt="">
                            <!-- Rating & Map Area -->
                            <div class="ratings-map-area d-flex">
                                <a href="#">8.5</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Martha’s bar</h5>
                                    <p>Manhathan</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-7.jpg" alt="">
                            <!-- Rating & Map Area -->
                            <div class="ratings-map-area d-flex">
                                <a href="#">9.5</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Delux Restaurant</h5>
                                    <p>Paris</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-8.jpg" alt="">
                            <!-- Rating & Map Area -->
                            <div class="ratings-map-area d-flex">
                                <a href="#">8.2</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Jim’s corner Pub</h5>
                                    <p>Madrid</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-9.jpg" alt="">
                            <!-- Rating & Map Area -->
                            <div class="ratings-map-area d-flex">
                                <a href="#">8.7</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>tower Risto bar</h5>
                                    <p>Sydney</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Features Area -->
                        <div class="single-features-area">
                            <img src="img/bg-img/feature-10.jpg" alt="">
                            <!-- Rating & Map Area -->
                            <div class="ratings-map-area d-flex">
                                <a href="#">9.8</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>Pizzeria venezia</h5>
                                    <p>Hong Kong</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Restaurant Area End ***** -->

    <!-- ***** Features Events Area Start ***** -->
    <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Featured events</h4>
                        <p>Editor’s pick</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-1.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>Jazz Concert</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-2.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>DeeJay in the house</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-3.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>Theatre Night outside</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-4.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>Wine tasting</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.6s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-5.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>New Moon Party</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-feature-events-area d-sm-flex align-items-center wow fadeInUpBig" data-wow-delay="0.7s">
                        <div class="feature-events-thumb">
                            <img src="img/bg-img/event-6.jpg" alt="">
                            <div class="date-map-area d-flex">
                                <a href="#">26 Nov</a>
                                <a href="#"><img src="img/core-img/map.png" alt=""></a>
                            </div>
                        </div>
                        <div class="feature-events-content">
                            <h5>Happy hour at pub</h5>
                            <h6>Manhathan</h6>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra...</p>
                        </div>
                        <div class="feature-events-details-btn">
                            <a href="#">+</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Events Area End ***** -->

    <!-- ***** Clients Area Start ***** -->
    <div class="dorne-clients-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="clients-logo d-md-flex align-items-center justify-content-around">
                        <img src="img/clients-img/1.png" alt="">
                        <img src="img/clients-img/2.png" alt="">
                        <img src="img/clients-img/3.png" alt="">
                        <img src="img/clients-img/4.png" alt="">
                        <img src="img/clients-img/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Clients Area End ***** -->

<?php
include "footer.php";
?>